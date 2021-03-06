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
        
                                        <a href="/address-add">Address Book</a></li>
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

                                                    <a class="{{ (request()->is('my-products*')) ? 'dash-active' : '' }}" href="/my-products">My Products</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="dash__address-header">
                                                <h1 class="dash__h1">Address Book</h1>
                                                <div>

                                                    <span class="dash__link dash__link--black u-s-m-r-8">

                                                        <a href="dash-address-make-default.html">Make default shipping address</a></span>

                                                    <span class="dash__link dash__link--black">

                                                        <a href="dash-address-make-default.html">Make default shipping address</a></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                        <div class="dash__table-2-wrap gl-scroll">
                                            <table class="dash__table-2">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Full Name</th>
                                                        <th>Address</th>
                                                        <th>Region</th>
                                                        <th>Phone Number</th>
                                                        <th>Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($addresses as $address)
                                                    <tr>
                                                        <td>
                                                            <a class="address-book-edit btn--e-transparent-platinum-b-2" href="/address-edit/{{ $address->id }}">Edit</a>
                                                            <a class="mini-product__delete-link far fa-trash-alt" href="/address-delete/{{ $address->id }}"></a>
                                                        </td>
                                                        <td> {{ $address->first_name.' '.$address->last_name }}</td>
                                                        <td> {{ $address->address.' '.$address->city}} </td>
                                                        <td> {{ $address->state.' '.$address->pincode }} </td>
                                                        <td> {{ $address->phone_no }} </td>
                                                        <td> {{ $address->type }} </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>

                                        <a class="dash__custom-link btn--e-brand-b-2" href="{{ route('address-add') }}"><i class="fas fa-plus u-s-m-r-8"></i>

                                            <span>Add New Address</span></a></div>
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