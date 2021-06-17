@extends('layouts/layout')

@section('main')

        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="shop-w-master">
                                <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                                    <span>FILTERS</span></h1>
                                <div class="shop-w-master__sidebar">
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">CATEGORY</h1>

                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-category">
                                                <ul class="shop-w__category-list gl-scroll">
                                                    @php
                                                        $categories = \App\Models\Category::all();
                                                    @endphp
                                                    @foreach ($categories as $index => $category)
                                                        <li class="has-list">
                                                            <a href="#">{{ $category->name }}</a>
                                                            <span class="js-shop-category-span {{ (request()->is('category/'.$category->name.'*')) ? 'is-expanded' : '' }} fas fa-plus u-s-m-l-6"></span>
                                                            @php
                                                                $sub_categories = \App\Models\SubCategory::where('category_id', $category->id)->get();
                                                            @endphp
                                                            <ul style="{{ (request()->is('category/'.$category->name.'*')) ? 'display:block' : '' }}">
                                                                @foreach ($sub_categories as $sub_category)
                                                                    <li class="has-list ">

                                                                        <a href="">{{ $sub_category->name }}</a>

                                                                        <span class="js-shop-category-span fas fa-plus u-s-m-l-6 {{ (request()->is('category/'.$category->name.'/'.$sub_category->name.'*')) ? 'is-expanded' : '' }}"></span>
                                                                        @php
                                                                            $sub_sub_categories = \App\Models\SubSubCategory::where('sub_category_id', $sub_category->id)->get();
                                                                        @endphp
                                                                        <ul style="{{ (request()->is('category/'.$category->name.'/'.$sub_category->name.'*')) ? 'display:block' : '' }}">
                                                                            @foreach ($sub_sub_categories as $sub_sub_category)
                                                                                <li>
                                                                                    <a href="{{ route('category',[$category->name, $sub_category->name, $sub_sub_category->name]) }}">{{ $sub_sub_category->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12">
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
                                    <div class="row is-grid-active">
                                        @if ($products == null)
                                            <div class="col-lg-12 col-md-12 u-s-m-b-30">
                                                <div class="empty">
                                                    <div class="empty__wrap">
                
                                                        <span class="empty__big-text">Oops</span>
                
                                                        <span class="empty__text-1">Looks like products you're looking for not availabe at the moment.</span>
                
                                                        <a class="empty__redirect-link btn--e-brand" href="/">GO TO HOME</a></div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach ($products as $product)
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <div class="product-m">
                                                        <div class="product-m__thumb">

                                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('product', [$product->id]) }}">
                                                            {{-- <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('product', ['slug']) }}"> --}}

                                                                <img class="aspect__img" src="/fetch_image_1/{{ $product->id }}" alt=""></a>
                                                            <div class="product-m__quick-look">

                                                                <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                                            <div class="product-m__add-cart">

                                                                <a class="btn--e-brand" href="/add-to-cart/{{ $product->id }}">Add to Cart</a></div>
                                                        </div>
                                                        <div class="product-m__content">
                                                            <div class="product-m__category">

                                                                {{-- <a href="#">Men Clothing</a></div>
                                                            <div class="product-m__name"> --}}

                                                                <a href="#">{{ $product->title }}</a></div>
                                                            <div class="product-m__rating gl-rating-style"></div>
                                                            <div class="product-m__price">{{ '₹'.$product->price }}</div>
                                                            <div class="product-m__hover">
                                                                <div class="product-m__preview-description">
                                                                    <span>{{ $product->description }}</span>
                                                                </div>
                                                                <div class="product-m__wishlist">

                                                                    <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    
                                    </div>
                                </div>
                                {{-- <div class="u-s-p-y-60">

                                    <!--====== Pagination ======-->
                                    <ul class="shop-p__pagination">
                                        <li class="is-active">

                                            <a href="shop-side-version-2.html">1</a></li>
                                        <li>

                                            <a href="shop-side-version-2.html">2</a></li>
                                        <li>

                                            <a href="shop-side-version-2.html">3</a></li>
                                        <li>

                                            <a href="shop-side-version-2.html">4</a></li>
                                        <li>

                                            <a class="fas fa-angle-right" href="shop-side-version-2.html"></a></li>
                                    </ul>
                                    <!--====== End - Pagination ======-->
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->
        </div>
        <!--====== End - App Content ======-->

@endsection