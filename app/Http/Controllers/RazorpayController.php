<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RazorpayController extends Controller
{
    private $razorpay_id = "rzp_test_YQhD1SQpzPaAZg";
    private $razorpay_key = "jBi2KNbXHDy4IUdUVK28WrKH";

    public function payment() {
        return view('shop.payment');
    }

    public function initiate(Request $request) {

        if ($request->payment == 'cash') {
            //payment through cash
            //saving in has order table
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->product_id = $request->all()['product_id'];
            $order->address_id = $request->all()['address'];
            $order->payment_mode = 'cash';
            $order->payment_id = Str::random(20);
            $order->status = 'Processing';
            $order->save();

            //deleting product from cart
            ShoppingCart::destroy($request->all()['cart_id']);

            return view('shop.payment-success-page');

        } elseif ($request->payment == 'razorpay') {
            //genrating random recipt id
            $receiptId = Str::random(20);

            $api = new Api($this->razorpay_id, $this->razorpay_key);

            //creating order
            $order = $api->order->create(array(
                'receipt' => $receiptId,
                'amount' => $request->all()['amount'] * 100,
                'currency' => 'INR'
            ));

            $response = [
                'orderId' => $order['id'],
                'razorpayId' => $this->razorpay_id,
                'amount' => $request->all()['amount'] * 100,
                'currency' => 'INR',
                'description' => 'Testing description',
                'product_id' => $request->all()['product_id'],
                'address_id' => $request->all()['address'],
                'cart_id' => $request->all()['cart_id'],
            ];
            return view('shop.payment-page',compact('response'));
        }       
        
    }

    public function complete(Request $request) {
        // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );

        $user_id = Auth::user()->id;
        $order_id = $request->all()['rzp_paymentid'];
        $razorpay_id = $request->all()['rzp_orderid'];
        $amount = $request->all()['rzp_amount'];

        // storing data in table and sending user on payment successful page
        if($signatureStatus == true)
        {
            $pay = new Payment();
            $pay->order_id = $razorpay_id;
            $pay->razorpay_id = $order_id;
            $pay->amount = $amount;
            $pay->save();

            //saving in has rented table
            $order = new Order();
            $order->user_id = $user_id;
            $order->product_id = $request->all()['product_id'];
            $order->address_id = $request->all()['address_id'];
            $order->payment_mode = 'razorpay';
            $order->payment_id = $request->all()['rzp_paymentid'];
            $order->status = 'Processing';
            $order->save();

            //deleting product from cart
            ShoppingCart::destroy($request->all()['cart_id']);

            return view('shop.payment-success-page');
        }
        else{
            return view('shop.payment-failed-page');
        }
    }

    private function signatureVerify($_signature, $_paymentId, $_orderId)
    {
        try
        {
            $api = new Api($this->razorpay_id, $this->razorpay_key);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e)
        {
            // If Signature is not correct its give a excetption so we use try catch
            return false;
        }
    }

}
