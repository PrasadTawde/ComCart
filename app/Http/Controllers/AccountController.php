<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    private $razorpay_id = "rzp_test_29mNCEHnUwpMe3";
    private $razorpay_key = "xBkyOFnNZugk8JxZljvtjvHA";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::join('users', 'accounts.user_id', '=', 'users.id')
        ->select('accounts.*', 'users.*')
        ->get();
        
        return view('admin.manage-accounts', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
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
            'description' => 'Payments',
        ];
       
        return view('user.payment-page',compact('response'));
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
            $account = Account::where('user_id', Auth::user()->id)->first();
            $account->settlement = $account->settlement + $amount;
            $account->save();
            
            return redirect()->route('my-account');
        }
        else{
            return redirect()->route('my-account');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
