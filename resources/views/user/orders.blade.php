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
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                                    <span class="dash__text u-s-m-b-30">Here you can see all products that have been delivered.</span>
                                    {{-- <form class="m-order u-s-m-b-30" id="form_show">
                                        <div class="m-order__select-wrapper">

                                            <label class="u-s-m-r-8" for="my-order-sort">Show:</label><select class="select-box select-box--primary-style" id="my-order-sort">
                                                <option selected value="5">Last 5 orders</option>
                                                <option value="10">Last 10 orders</option>
                                                <option value="all">All Orders</option>
                                            </select></div>
                                    </form> --}}
                                    <div class="m-order__list">
                                        @foreach ($orders as $order)
                                            <div class="m-order__get">
                                                <div class="manage-o__header u-s-m-b-30">
                                                    <div class="dash-l-r">
                                                        <div>
                                                            <div class="manage-o__text-2 u-c-secondary">Order #{{ $order->payment_id }}</div>
                                                            <div class="manage-o__text u-c-silver">Placed on {{ $order->updated_at }}</div>
                                                        </div>
                                                        <div>
                                                            <div class="dash__link dash__link--brand">

                                                                <a href="/orders-track/{{ $order->order_id }}">MANAGE</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="manage-o__description">
                                                    <div class="description__container">
                                                        <div class="description__img-wrap">

                                                            <img class="u-img-fluid" src="/fetch_image_1/{{ $order->product_id }}" alt="ordered_prod"></div>
                                                        <div class="description-title">{{ $order->title }}</div>
                                                    </div>
                                                    <div class="description__info-wrap">
                                                        <div>

                                                            <span class="manage-o__badge 
                                                            @if($order->status == 'processing')
                                                                {{'badge--processing'}}
                                                            @elseif($order->status == 'shipped')
                                                                {{'badge--shipped'}}
                                                            @elseif($order->status == 'delivered' || $order->status == 'cancelled')
                                                                {{'badge--delivered'}}
                                                            @endif
                                                            ">{{ $order->status }}</span></div>
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Total:

                                                                <span class="manage-o__text-2 u-c-secondary">{{ '₹'.$order->paid_amount }}</span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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