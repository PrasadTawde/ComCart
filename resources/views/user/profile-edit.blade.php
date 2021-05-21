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

                                        <a href="edit.html">My Account</a></li>
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

                                            <span class="dash__text u-s-m-b-16">Hello, John Doe</span>
                                            <ul class="dash__f-list">
                                                <li>

                                                    <a class="dash-active" href="dashboard.html">Manage My Account</a></li>
                                                <li>

                                                    <a href="dash-my-profile.html">My Profile</a></li>
                                                <li>

                                                    <a href="dash-address-book.html">Address Book</a></li>
                                                <li>

                                                    <a href="dash-track-order.html">Track Order</a></li>
                                                <li>

                                                    <a href="dash-my-order.html">My Orders</a></li>
                                                <li>

                                                    <a href="dash-payment-option.html">My Payment Options</a></li>
                                                <li>

                                                    <a href="dash-cancellation.html">My Returns & Cancellations</a></li>
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
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                            <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>
                                            <div class="dash__link dash__link--secondary u-s-m-b-30">

                                                <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="dash-edit-p" action="/profile-edit" method="POST">
                                                        @csrf
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-fname">NAME *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="name" value="<?php echo$users[0]->name; ?>"></div>
                                                            
                                                        </div>
                                                        <div class="gl-inline">
                                                          
                                                            <div class="u-s-m-b-30">
                                                            <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>
                                                               <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="email" value="<?php echo$users[0]->email; ?>"></div>
                                                           </div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">phone no</h2>

                                                               <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="phone_no" value="<?php echo$users[0]->phone_no; ?>"></div>
                                                               <!--  <div class="dash__link dash__link--secondary">

                                                                    <a href="#">Change</a></div> -->
                                                            </div>
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">Gender</h2>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="gender" value="<?php echo$users[0]->gender; ?>"></div>
                                                                <!-- <div class="dash__link dash__link--secondary">

                                                                    <a href="#">Add</a></div> -->
                                                            </div>
                                                        </div>

                                                        <button class="dash__custom-link btn--e-brand-b-2" type="submit">Update</button>
                                                    </form>
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
@endsection