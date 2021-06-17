@extends('layouts/layout')

@section('main')

        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop-p">
                                <div class="shop-p__toolbar u-s-m-b-30">
                                    <div class="shop-p__tool-style">
                                        <div class="tool-style__group u-s-m-b-8">

                                            <span class="js-shop-grid-target is-active">Grid</span>

                                            <span class="js-shop-list-target">List</span></div>
                                        <form>
                                            <div class="tool-style__form-wrap">
                                                <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                        <option>Show: 8</option>
                                                        <option selected>Show: 12</option>
                                                        <option>Show: 16</option>
                                                        <option>Show: 28</option>
                                                    </select></div>
                                                <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                        <option selected>Sort By: Newest Items</option>
                                                        <option>Sort By: Latest Items</option>
                                                        <option>Sort By: Best Selling</option>
                                                        <option>Sort By: Best Rating</option>
                                                        <option>Sort By: Lowest Price</option>
                                                        <option>Sort By: Highest Price</option>
                                                    </select></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="shop-p__collection">
                                    @if ($products == null)
                                        <div class="col-lg-12 col-md-12 u-s-m-b-30">
                                            <div class="empty">
                                                <div class="empty__wrap">

                                                    <span class="empty__big-text">Oops</span>

                                                    <span class="empty__text-1">Looks like products you're looking for not availabe at the moment.</span>

                                                    <a class="empty__redirect-link btn--e-brand" href="/">GO TO HOME</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    <div class="row is-grid-active">
                                        @foreach ($products as $product)
                                            <div class="col-lg-3 col-md-4 col-sm-6">
                                                <div class="product-m">
                                                    <div class="product-m__thumb">

                                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="/auction-product-details/{{$product->id}}">

                                                            <img class="aspect__img" src="/fetch_auction_image_1/{{ $product->id }}" alt=""></a>
                                                        {{-- <div class="product-m__quick-look">

                                                            <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div> --}}
                                                        <div class="product-m__add-cart">

                                                            <a class="btn--e-brand" href="/auction-product-details/{{$product->id}}">Bid</a></div>
                                                    </div>
                                                    <div class="product-m__content">
                                                        <div class="product-m__name">

                                                            <a href="product-detail.html">{{ $product->title }}</a>
                                                        </div>
                                                        <div class="product-m__price" style="margin-bottom:10px"> {{'₹'.$product->current_bid_amount}}</div>

                                                        <div class="u_c_warning countdown--style-special">
                                                            <span>Auction ends on :</span>
                                                            <h4 class="countdown--style-special">{{date('d/M/Y h:i:s',strtotime($product->ending_time))}}</h4>
                                                        </div>
                                                        <div class="product-m__hover">
                                                            <div class="product-m__preview-description">

                                                                <span>{{ $product->description }}.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->
        </div>
        <!--====== End - App Content ======-->

        @endsection