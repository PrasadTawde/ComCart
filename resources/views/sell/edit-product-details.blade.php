@extends('layouts/layout')

@section('main')




<div class="section__content">
    <div class="container">
        <div class="row row--center">
            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                <div class="l-f-o">
                    <div class="l-f-o__pad-box">
                        <h1 class="gl-h1">Edit Product Details</h1>
                        @if($errors->any())
                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                        @endif
                        <form class="l-f-o__form" method="post" action="/product-update/{{$data[0]->id}}" enctype="multipart/form-data">
                            @csrf
                            <!-- </div> -->
                            <div class="u-s-m-b-30" id="subCategory">
                                <div class="u-s-m-b-30" id="Electronics">
                                    <div class="u-s-m-b-30">

                                    </div>

                                    <div class="u-s-m-b-30">

                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-title"> Add New Title</label>
                                        <input class="input-text input-text--primary-style" type="text" name="title" id="title" placeholder="{{$data[0]->title}}" value="{{$data[0]->title}}">
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-info"> Add New Discription</label>
                                        <input class="input-text input-text--primary-style" type="text" name="info" id="info" placeholder="{{$data[0]->description}}" value="{{$data[0]->description}}">
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-quantity">Enter New Quantity</label>
                                        <input class="input-text input-text--primary-style" type="number" name="quantity" id="quantity" placeholder="{{$data[0]->quantity}}" value="{{$data[0]->quantity}}">
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-price">Enter New Price</label>
                                        <input class="input-text input-text--primary-style" type="number" name="price" id="price" placeholder="{{$data[0]->price}}" value="{{$data[0]->price}}">
                                    </div>


                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="">Select New Images</label>
                                        <div class="gl-inline">

                                            <!-- <label class="gl-label" for="e-images1">Image1</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="images1" id="e-images1" placeholder="" value="{{old('images1')}}">
                                            <!-- <label class="gl-label" for="e-images2">Image2</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="images2" id="e-images2" placeholder=""  value="{{old('images2')}}">

                                        </div>
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-15">
                                                <button class="btn btn--e-brand-b-2" type="submit" >
                                                   <span>Update Details</span></button>
                                               </div>
                                           </div>
                                       </div>

                                   </div>

                                   <div class="u-s-m-b-30" id="Furniture" style="display:none">
                                    <div>


                                    </div>
                                </div>
                                <div class="u-s-m-b-30" id="Vehicle" style="display:none">
                                    <p>vehi</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>



@endsection