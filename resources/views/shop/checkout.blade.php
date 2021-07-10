@extends('layouts/layout')

@section('main')

        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="/">Home</a></li>
                                    <li class="is-marked">

                                        <a href="/checkout">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->

            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="checkout-f">
                            <div class="row">
                                 <div class="col-lg-6">
                                        <div class="o-summary">
                                            <div class="o-summary__section u-s-m-b-30">
                                                <div class="o-summary__box">
                                                    <h1 class="checkout-f__h1">ORDER SUMMARY</h1>
                                                    <div class="o-summary__item-wrap gl-scroll">
                                                        {{-- @php
                                                            $price = 0;
                                                            $shipping_price = 0;
                                                            $tax = 0;
                                                        @endphp --}}
                                                        @foreach ($cart_products as $product)
                                                            <div class="o-card">
                                                                <div class="o-card__flex">
                                                                    <div class="o-card__img-wrap">
                
                                                                        <img class="u-img-fluid" src="/fetch_image_1/{{ $product->product_id }}" alt=""></div>
                                                                    <div class="o-card__info-wrap">
                
                                                                        <span class="o-card__name">
                
                                                                            <a href="{{ route('product', [$product->product_id]) }}">{{ $product->title }}</a></span>
                
                                                                        {{-- <span class="o-card__quantity">Quantity x 1</span> --}}
                                                                        {{-- @php
                                                                            $price = $price + $product->price;
                                                                            $shipping_price = $shipping_price + 100;
                                                                        @endphp --}}
                                                                        <span class="o-card__price">{{ '₹'.$product->price }}</span></div>
                                                                </div>
                
                                                                <a class="o-card__del far fa-trash-alt" href="/remove-from-cart/{{ $product->id }}"></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="/payment" method="post">
                                            @csrf
                                            {{ Session::forget('success') }}
                                            <div class="o-summary__section u-s-m-b-30">
                                                <div class="o-summary__box">
                                                    <h1 class="checkout-f__h1">SHIPPING & BILLING</h1>
                                                    <div class="ship-b">
                                                        @if ($addresses->isEmpty())

                                                        @error('address_id')
                                                            <span style="color: red; font-size: 95%;">{{ 'Add Shipping & Billing Address' }}</span>
                                                        @enderror
                                                        <div>
                                                            <a class="dash__custom-link btn--e-brand-b-2" href="/address-add"><i class="fas fa-plus u-s-m-r-8"></i>
                                                                <span>Add New Address</span>
                                                            </a>
                                                        </div>
                                                        @else
                                                        <span class="ship-b__text">Ship to:</span>
                                                        @foreach ($addresses as $address)
                                                            <div class="ship-b__box u-s-m-b-10">
                                                                <p class="ship-b__p">{{ $address->address.' '.$address->city.' '.$address->state.' '.$address->pincode.' +91'.$address->phone_no }}</p>
                                                                <div class="radio-box">
                                                                    <input type="radio" name="address" id="address_{{ $address->id }}" value="{{ $address->id }}" checked required>
                                                                    <div class="radio-box__state radio-box__state--primary">

                                                                        <label class="radio-box__label" for="address_1"></label></div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!--====== Order Summary ======-->
                                        <div class="o-summary">
                                            <div class="o-summary__section u-s-m-b-30">
                                                <div class="o-summary__box">
                                                    <table class="o-summary__table">
                                                        <tbody>
                                                            <tr>
                                                                <td>SHIPPING</td>
                                                                <td>{{ '₹100 - ₹500' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                <span style="color: red;font-size: 80%">*Shipping charges will be collected on delivery and may vary</span>
    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>GRAND TOTAL</td>
                                                                <td>{{ '₹'.$product->price }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="o-summary__section u-s-m-b-30">
                                                <div class="o-summary__box">
                                                    <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                                        <div class="u-s-m-b-10">

                                                            <!--====== Radio Box ======-->
                                                            <div class="radio-box">

                                                                <input type="radio" id="cash-on-delivery" name="payment" value="cash">
                                                                <div class="radio-box__state radio-box__state--primary">

                                                                    <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                                            </div>
                                                            <!--====== End - Radio Box ======-->

                                                            <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery.</span>
                                                        </div>
                                                        <div class="u-s-m-b-10">

                                                            <!--====== Radio Box ======-->
                                                            <div class="radio-box">

                                                                <input type="radio" id="pay-razorpay" name="payment" value="razorpay" checked>
                                                                <div class="radio-box__state radio-box__state--primary">

                                                                    <label class="radio-box__label" for="pay-pal">Pay with Razor</label></div>
                                                            </div>
                                                            <!--====== End - Radio Box ======-->

                                                            <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Razorpay's site to set up your billing information.</span>
                                                        </div>
                                                        <input type="text" name="cart_id" hidden="" value="{{ $product->id }}">
                                                        <input type="text" name="product_id" hidden="" value="{{ $product->product_id }}">
                                                        <input type="text" name="amount" hidden="" value="{{ $product->price }}">
                                                        <div>
                                                            <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--====== End - Order Summary ======-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
        </div>
        <!--====== End - App Content ======-->

@endsection