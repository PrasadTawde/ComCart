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

                                <a href="/orders">My Orders</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                <div class="dash__pad-1">

                                    <span class="dash__text u-s-m-b-16">Hello, {{ Auth::user()->name }}</span>
                                    <ul class="dash__f-list">
                                        <li>

                                            <a class="{{ (request()->is('*my-account*')) ? 'dash-active' : '' }}" href="/my-account">Manage My Account</a></li>
                                        <li>

                                            <a class="{{ (request()->is('profile*')) ? 'dash-active' : '' }}" href="/profile">My Profile</a></li>
                                        <li>

                                            <a class="{{ (request()->is('address*')) ? 'dash-active' : '' }}" href="/address">Address Book</a></li>
                                        <li>

                                            <a class="{{ (request()->is('orders*')) ? 'dash-active' : '' }}" href="/orders">My Orders</a>
                                        </li>
                                        <li>

                                            <a class="{{ (request()->is('my-products*')) ? 'dash-active' : '' }}" href="/my-products">My Products</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                            @foreach ($orders as $order)
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <div class="dash-l-r">
                                            <div>
                                                <div class="manage-o__text-2 u-c-secondary">Order #{{ $order->payment_id }}</div>
                                                <div class="manage-o__text u-c-silver">Placed on {{ $order->updated_at }}</div>
                                            </div>
                                            <div>
                                                <div class="manage-o__text-2 u-c-silver">Total:

                                                    <span class="manage-o__text-2 u-c-secondary">{{ '₹'.$order->paid_amount }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <div class="manage-o">
                                            <div class="manage-o__header u-s-m-b-30">
                                                <div class="manage-o__icon"><i class="fas fa-box u-s-m-r-5"></i>

                                                    <span class="manage-o__text">Package 1</span></div>
                                            </div>
                                            <div class="dash-l-r">
                                                <div class="manage-o__text u-c-secondary">
                                                    @if ($order->status == 'delivered')
                                                        {{'Delivered on '.$order->estimate_delivery_date }}
                                                    @endif
                                                    @if ($order->status == 'cancelled')
                                                        <span class="manage-o__badge badge--delivered">Cancelled</span>
                                                    @endif
                                                </div>
                                                <div class="manage-o__icon"><i class="fas fa-truck u-s-m-r-5"></i>

                                                    <span class="manage-o__text">Standard</span></div>
                                            </div>
                                            <div class="manage-o__timeline" >
                                                <div class="timeline-row">
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i @if ($order->status == 'processing' || $order->status == 'shipped' || $order->status == 'delivered')
                                                                {{'timeline-l-i--finish'}}
                                                            @elseif($order->status == 'cancelled')
                                                                {{'timeline-l-i--finish-brand'}}
                                                            @endif
                                                            
                                                            ">
                                                            <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Processing</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i @if ($order->status == 'shipped' || $order->status == 'delivered')
                                                                {{'timeline-l-i--finish'}}
                                                            @elseif($order->status == 'cancelled')
                                                                {{'timeline-l-i--finish-brand'}}
                                                            @endif ">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Shipped</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i @if ($order->status == 'delivered')
                                                                {{'timeline-l-i--finish'}}
                                                            @elseif($order->status == 'cancelled')
                                                                {{'timeline-l-i--finish-brand'}}
                                                            @endif">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Delivered</span>
                                                            @if($order->status != 'cancelled')
                                                                <span>Expected Delivery :{{ $order->estimate_delivery_date }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="manage-o__description">
                                                <div class="description__container">
                                                    <div class="description__img-wrap">

                                                        <img class="u-img-fluid" src="/fetch_image_1/{{ $order->product_id }}" alt=""></div>
                                                    <div class="description-title">{{ $order->title }}</div>
                                                </div>
                                                <div class="description__info-wrap">
                                                    <div>

                                                        <span class="manage-o__text-2 u-c-silver">Total:

                                                            <span class="manage-o__text-2 u-c-secondary">{{ '₹'.$order->paid_amount }}</span></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                            @foreach ($addresses as $address)
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Shipping & Billing Address</h2>
                                                    <h2 class="dash__h2 u-s-m-b-8">{{ $address->first_name.' '.$address->last_name}}</h2>

                                                    <span class="dash__text-2">{{ $address->address.' '.$address->city.' '.$address->state.' - '.$address->pincode.' - India' }}</span>

                                                    <span class="dash__text-2">{{ $address->phone_no }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                            <div class="dash__pad-3">
                                                <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                                <div class="dash-l-r u-s-m-b-8">
                                                    <div class="manage-o__text-2 u-c-secondary">Subtotal</div>
                                                    <div class="manage-o__text-2 u-c-secondary">{{ '₹'.$order->price }}</div>
                                                </div>
                                                <div class="dash-l-r u-s-m-b-8">
                                                    <div class="manage-o__text-2 u-c-secondary">Shipping Fee</div>
                                                    <div class="manage-o__text-2 u-c-secondary">₹100</div>
                                                </div>
                                                <div class="dash-l-r u-s-m-b-8">
                                                    <div class="manage-o__text-2 u-c-secondary">Total</div>
                                                    <div class="manage-o__text-2 u-c-secondary">{{ '₹'.$order->paid_amount }}</div>
                                                </div>

                                                <span class="dash__text-2">Paid by @if ($order->payment_mode == 'razorpay')
                                                    {{'RazorPay'}}
                                                @else
                                                    {{'Cash On Delivery'}}
                                                @endif</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->

@endsection