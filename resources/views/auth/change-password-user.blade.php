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

                                <a href="index.html">Home</a></li>
                            <li class="is-marked">

                                <a href="dash-address-add.html">My Account</a></li>
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

                                            <a class="{{ (request()->is('orders-track*')) ? 'dash-active' : '' }}" href="/orders-track">Track Order</a></li>
                                        <li>

                                            <a class="{{ (request()->is('orders*')) ? 'dash-active' : '' }}" href="/orders">My Orders</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                <div class="dash__pad-1">
                                    <ul class="dash__w-list">
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                <span class="dash__w-text">4</span>

                                                <span class="dash__w-name">Orders Placed</span></div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Cancel Orders</span></div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Wishlist</span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Change Password</h1>
                                    <form class="dash-address-manipulation" action="/change-password" method="POST">
                                        @csrf
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                @if (session()->has('error'))
                                                <span style="color: red; font-size: 80%;">{{ session()->get('error')  }}</span>
                                                @endif
                                                @if (session()->has('success'))
                                                <span style="color: rgb(0, 255, 64); font-size: 80%;">{{ session()->get('success')  }}</span>
                                                @endif
                                                <label class="gl-label" for="address-fname">Current Password</label>
                                                @error('current_password')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <input class="input-text input-text--primary-style" type="text" id="current_password" name="current_password" placeholder="Enter current password" value="{{ old('current_password') }}">
                                            </div>
                                            <div class="u-s-m-b-30">
                                            </div>
                                        </div>
                                        <div class="gl-inline u-s-m-r-10">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="address-lname">New Password</label>
                                                @error('new_password')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <input class="input-text input-text--primary-style" type="password" id="new_password" name="new_password" placeholder="Enter new password" value="{{ old('new_password') }}">
                                            </div>
                                            <div class="u-s-m-b-30">
                                            </div>
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="address-fname">Confirm Password</label>
                                                @error('confirm_password')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <input class="input-text input-text--primary-style" type="password" id="confirm_password" name="confirm_password" placeholder="Enter new password again" value="{{ old('confirm_password') }}">
                                            </div>
                                            <div class="u-s-m-b-30">
                                            </div>
                                        </div>
                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                    </form>
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