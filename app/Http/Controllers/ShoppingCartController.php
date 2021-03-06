<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cart_products = DB::table('shopping_cart')
            ->join('products', 'shopping_cart.product_id', '=', 'products.id')
            ->select('shopping_cart.*', 'products.*','shopping_cart.id')
            ->where('shopping_cart.user_id', $user_id)
            ->get();

            return view('shop.cart-view', ['cart_products' => $cart_products]);
        }
        else {
            return redirect('login');
        }

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
    public function store($id)
    {
        if (Auth::check()) {

            $user_id = Auth::user()->id;
            //storing product in shopping_cart table
            $cart = new ShoppingCart;
            $cart->user_id = $user_id;
            $cart->product_id = $id;
            $cart->save();

            //deleting quntity from product table
            $product = Product::find($id);
            $product->quantity = $product->quantity -1;
            $product->save();

            return redirect('cart');
        }
        else{
            return redirect('login');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //restoring back in products table
        $product_id = ShoppingCart::where('id',$id)->select('product_id')->first();

        $product = Product::find($product_id)->first();
        // dd($product);
        $product->quantity = $product->quantity + 1;
        $product->save();

        // deleting from cart
        ShoppingCart::destroy($id);

        return redirect()->back();
    }

    public function clear()
    {
        if (Auth::check()) {

            $user_id = Auth::user()->id;

            if (ShoppingCart::where('user_id', '=', $user_id)->count() > 0) {
                //restore all the products back to products table
                $products = ShoppingCart::where('user_id', '=', $user_id)->get();

                foreach ($products as $product) {
                    $id = $product->product_id;
                    // Product::onlyTrashed()->where('id', $id)->restore();
                    $product = Product::find($id);
                    $product->quantity = $product->quantity + 1;
                    $product->save();
                }

                //delete all the products from cart
                ShoppingCart::where('user_id', $user_id)->delete();
                return redirect('cart');
            } else {
                return redirect('cart');
            }
            
        }
        else{
            return redirect('login');
        }
    }

    public function checkout()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cart_products = DB::table('shopping_cart')
            ->join('products', 'shopping_cart.product_id', '=', 'products.id')
            ->select('shopping_cart.*', 'products.*','shopping_cart.id')
            ->where('shopping_cart.user_id', $user_id)
            ->get();

            $addresses = DB::table('user_addresses')->where('user_id', $user_id)->get();

            if ($cart_products->isEmpty()) {
                return view('shop.cart-view', ['cart_products' => $cart_products]);
            }else {
                return view('shop.checkout', ['cart_products' => $cart_products, 'addresses' => $addresses]);
            }
        }
        else {
            return redirect('login');
        }
    }

}
