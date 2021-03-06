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

                                    <a href="/cart">Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            @if ($cart_products->count() > 0)
            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                            <div class="table-responsive">
                                <table class="table-p">
                                    <tbody>
                                        {{-- @php
                                            $price = 0;
                                            $shipping_price = 0;
                                            $tax = 0;
                                        @endphp --}}
                                        <!--====== Row ======-->
                                        @foreach ($cart_products as $product)
                                            <tr>
                                                <td>
                                                    <div class="table-p__box">
                                                        <div class="table-p__img-wrap">

                                                            <img class="u-img-fluid" src="/fetch_image_1/{{ $product->product_id }}" alt=""></div>
                                                        <div class="table-p__info">

                                                            <span class="table-p__name">

                                                                <a href="{{ route('product', [$product->product_id]) }}">{{ $product->title }}</a></span>

                                                            {{-- <span class="table-p__category">

                                                                <a href="shop-side-version-2.html">Electronics</a></span> 
                                                            <ul class="table-p__variant-list">
                                                                <li>

                                                                    <span>Size: 22</span></li>
                                                                <li>

                                                                    <span>Color: Red</span></li>
                                                            </ul>--}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- @php
                                                        $price = $price + $product->price;
                                                        $shipping_price = $shipping_price + 100;
                                                    @endphp --}}
                                                    <span class="table-p__price">{{ '???'.$product->price }}</span>
                                                </td>
                                                <td>
                                                    {{-- <div class="table-p__input-counter-wrap">

                                                        <!--====== Input Counter ======-->
                                                        <div class="input-counter">

                                                            <span class="input-counter__minus fas fa-minus"></span>

                                                            <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                                            <span class="input-counter__plus fas fa-plus"></span></div>
                                                        <!--====== End - Input Counter ======-->
                                                    </div> --}}
                                                </td>
                                                <td>
                                                    <div class="table-p__del-wrap">

                                                        <a class="far fa-trash-alt table-p__delete-link" href="/remove-from-cart/{{ $product->id }}"></a></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!--====== End - Row ======-->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="route-box">
                                <div class="route-box__g1">

                                    <a class="route-box__link" href="/"><i class="fas fa-long-arrow-alt-left"></i>

                                        <span>CONTINUE SHOPPING</span></a></div>
                                <div class="route-box__g2">

                                    <a class="route-box__link" href="/clear-cart"><i class="fas fa-trash"></i>

                                        <span>CLEAR CART</span></a>

                                    <a class="route-box__link" href="/cart"><i class="fas fa-sync"></i>

                                        <span>UPDATE CART</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
            @else
            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 u-s-m-b-30">
                            <div class="empty">
                                <div class="empty__wrap">

                                    <span class="empty__big-text">EMPTY</span>

                                    <span class="empty__text-1">No items found on your cart.</span>

                                    <a class="empty__redirect-link btn--e-brand" href="/">CONTINUE SHOPPING</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
            @endif
        </div>
        <!--====== End - Section 2 ======-->

        @if ($cart_products->count() > 0)
        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                            <form class="f-cart" action="/checkout" method="get">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="f-cart__pad-box">
                                            <div class="u-s-m-b-30">
                                                <table class="f-cart__table">
                                                    <tbody>
                                                        <tr>
                                                            <td>SHIPPING</td>
                                                            <td>
                                                                {{ '???100 - ???500' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                            <span style="color: red;font-size: 80%">*Shipping charges will be collected on delivery and may vary</span>

                                                            </td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <td>SUBTOTAL</td>
                                                            <td>{{ '???'.$product->price }}</td>
                                                        </tr> --}}
                                                        <tr>
                                                            <td>GRAND TOTAL</td>
                                                            {{-- <td>{{ '???'.$shipping_price + $price }}</td> --}}
                                                            <td>{{ '???'.$product->price }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO CHECKOUT</button></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
        @endif
    </div>
    <!--====== End - App Content ======-->

@endsection