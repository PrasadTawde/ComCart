@extends('layouts/layout')

@section('main')

<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!--====== Product Detail Zoom ======-->
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                <div class="pd-o-img-wrap" data-src="/fetch_/fetch_auction_image_1/{{ $data['id'] }}">

                                    <img class="u-img-fluid" src="/fetch_/fetch_auction_image_1/{{ $data['id'] }}" data-zoom-image="/fetch_/fetch_auction_image_1/{{ $data['id'] }}" alt="">
                                </div>
                                <div class="pd-o-img-wrap" data-src="/fetch_/fetch_auction_image_1/{{ $data['id'] }}">

                                    <img class="u-img-fluid" src="/fetch_/fetch_auction_image_1/{{ $data['id'] }}" data-zoom-image="/fetch_/fetch_auction_image_1/{{ $data['id'] }}" alt="">
                                </div>
                            </div>

                            <span class="pd-text">Click for larger zoom</span>
                        </div>
                        <div class="u-s-m-t-15">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">
                                    <div>

                                        <img class="u-img-fluid" src="/fetch_/fetch_auction_image_1/{{ $data['id'] }}" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/fetch_auction_image_2/{{ $data['id'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-7">
                    <!--====== Product Right Side Details ======-->
                    <div class="pd-detail">
                        <div>

                            <span class="pd-detail__name">{{$data['title']}}</span>
                        </div>
                        <div>
                            <!-- <div class="pd-detail__inline">

                                <span class="pd-detail__price">{{'₹'.$data['current_bid_amount']}}</span>

                                

                                {{-- <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del></div> --}}
                            </div> -->


                            <?php date_default_timezone_set("Asia/Kolkata");
                            $today = date('d-m-y h:i:s');
                            $startdate = date('d-m-y h:i:s',strtotime($data['starting_time']));
                            $enddate = date('d-m-y h:i:s',strtotime($data['ending_time']));
                            $currentDate = strtotime($today);
                            $starting = strtotime($startdate);
                            $ending = strtotime($enddate);
                            ?>
                            @if($currentDate>$ending && $currentDate>$starting)

                            <div class="u-s-m-b-15">
                                <h4 class=" " style="color:red">Auction Ended On :</h4>
                                <h4 class=" u_c_warning"> {{date('d/M/Y h:i:s',strtotime($data['ending_time']))  }}</h4>
                                @if($high_bid==NULL)
                                <h5><span>No biddings yet </span></h5>
                                @else
                                <h5><span>This Product was sold for {{'₹'.$data['current_bid_amount']}} to {{$high_bid->name }} </span></h5>
                                @endif
                            </div>
                        </div>

                        <div class="u-s-m-b-15">
                            <form class="pd-detail__form">
                            {{ csrf_field() }}
                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">
                                        <!-- <input class="input-text input-text--primary-style" type="text" name="" id="" placeholder="₹0.00">
                                        <button type="submit" class="btn btn-sm btn-orange" href=""><span style="size: 10px;">Submit a Bid</span></button> -->
                                        <!-- <a class="btn btn--e-brand-b-2" href="">Add to Cart</a> -->
                                    </div>
                                </div>
                            </form>
                        </div>

                        
                        @elseif($currentDate>$starting)
                        <div class="pd-detail__inline-2">


                            <div class="pd-detail__inline">
                                <h4 class=" " style="color:red">Current Bidding</h4>
                                <span class="pd-detail__price">{{'₹'.$data['current_bid_amount']}}</span>
                                {{-- <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del></div> --}}
                            </div>


                            <div class="u-s-m-b-15">
                                <span> </span>
                                <!-- <h4 class=" " style="color:green"> {{date('d/M/Y h:i:s',strtotime($data['starting_time'])) }}</h4> -->
                                <h4 class=" " style="color:green">Auction is Live</h4>
                               

                                <span>Auction Ends On: </span>
                                <h4 class=" u_c_warning"> {{date('d/M/Y h:i:s',strtotime($data['ending_time']))  }}</h4>

                            </div>
                        </div>

                        <div class="u-s-m-b-15">
                            <form class="pd-detail__form" method="post" action="/bid/{{$data['id']}}/{{$data['current_bid_amount']}}">
                            {{ csrf_field() }}
                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">
                                        <input class="input-text input-text--primary-style" type="text" name="bid-amount" id="" placeholder="₹0.00">
                                        <input type="submit" class="btn btn-sm btn-orange">
                                        <!-- <a class="btn btn--e-brand-b-2" href="">Add to Cart</a> -->
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="pd-detail__inline">
                        @if($high_bid==NULL)
                                <h5><span>No biddings yet </span></h5>
                                @else
                                <h4 class=" " style="color:red">Highest Bidder :<span style="color:blue;">{{$high_bid->name }}</span></h4>
                                
                                @endif
                            </div>

                        @elseif($currentDate < $starting) <div class="pd-detail__inline-2">

                            <div class="pd-detail__inline">
                                <h4 class=" " style="color:red">Starting Price</h4>
                                <span class="pd-detail__price">{{'₹'.$data['current_bid_amount']}}</span>
                                {{-- <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del></div> --}}
                            </div>

                            <div class="u-s-m-b-15">
                                <span>Auction starts on: </span>
                                <h4 class=" " style="color:green"> {{date('d/M/Y h:i:s',strtotime($data['starting_time'])) }}</h4>

                                <span>Auction Ends On: </span>
                                <h4 class=" u_c_warning"> {{date('d/M/Y h:i:s',strtotime($data['ending_time']))  }}</h4>

                            </div>
                    </div>

                    <div class="u-s-m-b-15">
                        <form class="pd-detail__form">
                            <div class="pd-detail-inline-2">
                                <div class="u-s-m-b-15">
                                    <!-- <input class="input-text input-text--primary-style" type="text" name="" id="" placeholder="₹0.00">
                                    <button type="submit" class="btn btn-sm btn-orange" href=""><span style="size: 10px;">Submit a Bid</span></button> -->
                                    <!-- <a class="btn btn--e-brand-b-2" href="">Add to Cart</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif

                    <div class="u-s-m-b-15">

                        <span class="pd-detail__preview-desc">{{$data['description']}}</span>
                    </div>


                    <div class="u-s-m-b-15">
                        <div class="pd-detail__inline">

                            <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                <a href="/wishlist">Add to Wishlist</a>
                        </div>
                    </div>



                    <div class="u-s-m-b-15">

                        <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                        <ul class="pd-detail__policy-list">
                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                <span>Buyer Protection.</span>
                            </li>
                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                <span>Full Refund if you don't receive your order.</span>
                            </li>
                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                <span>Cash on Delivery.</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--====== End - Product Right Side Details ======-->
            </div>
        </div>
    </div>
</div>


<!--====== Product Detail Tab ======-->
<div class="u-s-p-y-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pd-tab">
                    <div class="u-s-m-b-30">
                        <ul class="nav pd-tab__list">
                            <li class="nav-item">

                                <a class="nav-link active" data-toggle="tab" href="#pd-desc">DESCRIPTION</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <!--====== Tab 1 ======-->
                        <div class="tab-pane fade show active" id="pd-desc">
                            <div class="pd-tab__desc">
                                <div class="u-s-m-b-15">
                                    <p>discription.</p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <ul>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Buyer Protection.</span>
                                        </li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Full Refund if you don't receive your order.</span>
                                        </li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Returns accepted if product not as described.</span>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="u-s-m-b-15">
                                                <h4>PRODUCT INFORMATION</h4>
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <div class="pd-table gl-scroll">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Main Material</td>
                                                                <td>Cotton</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Color</td>
                                                                <td>Green, Blue, Red</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sleeves</td>
                                                                <td>Long Sleeve</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Top Fit</td>
                                                                <td>Regular</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Print</td>
                                                                <td>Not Printed</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Neck</td>
                                                                <td>Round Neck</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pieces Count</td>
                                                                <td>1 Piece</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Occasion</td>
                                                                <td>Casual</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shipping Weight (kg)</td>
                                                                <td>0.5</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> --}}
                            </div>
                        </div>
                        <!--====== End - Tab 1 ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Product Detail Tab ======-->
<!-- end foreach here -->
<div class="u-s-p-b-90">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>

                        <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="slider-fouc">
                <div class="owl-carousel product-slider" data-item="4">
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="/assets/images/product/electronic/product1.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                        </li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Beats Bomb Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="/assets/images/product/electronic/product2.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                        </li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Red Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="/assets/images/product/electronic/product3.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                        </li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Yellow Wireless Headphone</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="/assets/images/product/electronic/product23.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                        </li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Razor Gear Ultra Slim 8GB Ram</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="/assets/images/product/electronic/product26.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                        </li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Razor Gear Ultra Slim 12GB Ram</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="/assets/images/product/electronic/product30.jpg" alt=""></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                        </li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="product-o__name">

                                <a href="product-detail.html">Razor Gear Ultra Slim 16GB Ram</a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(20)</span>
                            </div>

                            <span class="product-o__price">$125.00

                                <span class="product-o__discount">$160.00</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 1 ======-->
</div>
<!--====== End - App Content ======-->


@endsection