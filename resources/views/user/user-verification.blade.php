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

                                <a >User Verification</a></li>
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
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">User Verification</h1>

                                    <span class="dash__text u-s-m-b-30">We need your verification details.</span>
                                    <form class="dash-address-manipulation" action="/user-verification" method="POST">
                                        @csrf
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="user-dateofbirth">Date Of Birth *</label>
                                                @error('date_of_birth')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <input class="input-text input-text--primary-style" type="date" id="user-dateofbirth" name="date_of_birth" placeholder="Date Of Birth" value="{{ old('date_of_birth') }}"></div>

                                                <div class="u-s-m-b-30">

                                                <!--====== Select Box ======-->

                                                <label class="gl-label" for="user-documenttype">Document Type *</label>
                                                @error('document_type *')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <select class="select-box select-box--primary-style" id="user-documenttype" name="document_type">
                                                    <option selected value="">Select Document Type</option>
                                                    <option value="Adhar Card" >Adhar Card</option>
                                                    <option value="Driving License" >Driving License</option>
                                                    <option value="Voters ID" >Voters ID</option>
                                                    <option value="PAN card">PAN card</option>

                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div>
                                           
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="user-phone">Phone *</label>
                                                @error('phone_no')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <input class="input-text input-text--primary-style" type="text" id="user-phone" name="phone_no" placeholder="Phone Number" value="{{ old('phone_no') }}"></div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="user-identificationnumber">Identification Number *</label>
                                                @error('identification_no')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <input class="input-text input-text--primary-style" type="text" id="user-identificationnumber" name="identification_no" placeholder="Identification Number" value="{{ old('identification_no') }}"></div>
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