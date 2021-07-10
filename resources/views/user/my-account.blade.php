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

                                <a href="/my-account">My Account</a></li>
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

                                            <a class="{{ (request()->is('orders*')) ? 'dash-active' : '' }}" href="/orders">My Orders</a></li>
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
                                    <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>
                                    <div class="row">
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8"><i class="fas fa-id-badge u-s-m-r-6"></i>PERSONAL PROFILE</h2>
                                                    <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                        <a href="{{ route('profile-edit') }}">Edit</a>
                                                    </div>
                                                    <br>
                                                    <span class="dash__text">{{ Auth::user()->name }}</span>

                                                    <span class="dash__text">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8"><i class="fas fa-address-book u-s-m-r-6"></i>ADDRESS BOOK</h2>
                                                    @if ($addresses == null)
                                                        <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                            <a href="{{ route('address-add') }}">Add</a>
                                                        </div>
                                                    @else
                                                        <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                            <a href="{{ $addresses->id }}">Edit</a>
                                                        </div>
                                                        <span class="dash__text">{{ $addresses->address.' '.$addresses->city.' '.$addresses->state.' '.$addresses->pincode.' - INDIA'}}</span>
                                                        <span class="dash__text">{{ $addresses->phone_no }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if($permission == true)
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8"><i class="fas fa-info u-s-m-r-6"></i>Auctioneer Status</h2>
                                                    <div class="pd-detail__inline">
                                                        <span @if ($verification_status->status == 'verified')
                                                            class="pd-detail__stock" 
                                                        @else
                                                            class="pd-detail__left"
                                                        @endif>{{ ucfirst($verification_status->status) }}</span>
                                                    </div><br>
                                                    @if ($verification_status->status == 'verified')
                                                        <div class="pd-detail__inline">
                                                            <a class="dash__custom-link btn--e-brand-b-2" href="/add-auction-product">
                                                                <span>Add Product</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <a class="dash__custom-link btn--e-brand-b-2" href="/user-verification">
                                                <span>Want to be a Auctioneer</span>
                                                <i class="fas fa-question u-s-m-r-8"></i>
                                            </a>
                                        </div>
                                        @endif

                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8"><i class="fas fa-cogs u-s-m-r-6"></i> Account Settings</h2>
                                                    <br>
                                                    <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                        <a href="{{ route('change-password') }}">Change Password</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8"><i class="fas fa-wallet u-s-m-r-6"></i> Account Balances</h2>
                                                    <br>
                                                    @if ($settlement_amount != null)
                                                        <span class="dash__text">{{ '₹'. $settlement_amount->settlement }}</span>
                                                        @if ($settlement_amount->settlement < 0)
                                                        <form action="/settle" method="post">
                                                            @csrf
                                                            {{ Session::forget('success') }}
                                                            <input type="text" name="amount" hidden="" value="{{ $settlement_amount->settlement/-1 }}">
                                                            <button class="btn btn--e-brand-b-2" type="submit">Pay</button>
                                                        </form>
                                                        @endif
                                                    @else
                                                    <span class="dash__text">{{ '₹0' }}</span>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>                                        
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