@extends('layouts/layout')

@section('main')

<div class="section__content">
    <div class="container">
        <div class="row row--center">
            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                <div class="l-f-o">
                    <div class="l-f-o__pad-box">
                        <h1 class="gl-h1">Add Product</h1>
                        @if($errors->any())
                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(Session::get('success'))
                        <div class="alert" style="background: rgba(13, 230, 13, 0.637) ">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        @if(Session::get('fail'))
                        <div class="alert " style="background: rgba(128, 0, 0, 0.3) ">
                            {{Session::get('fail')}}
                        </div>
                        @endif

                        <form class="l-f-o__form" method="post" action="{{route('addAuction')}}" enctype="multipart/form-data">
                            @csrf
                            <!-- </div> -->
                            <div class="u-s-m-b-30">
                                <div class="u-s-m-b-30">
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="sub-catagory">Select Category</label>
                                        <select class="select-box select-box--primary-style u-w-100" id="category" name="category">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="sub-catagory">Select Sub-Category</label>
                                        <select class="select-box select-box--primary-style u-w-100" id="sub_catagory" name="sub_category">
                                            <option selected disabled>Select Sub-Category</option>
                                        </select>
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="sub-catagory">Select Sub-Sub-Category</label>
                                        <select class="select-box select-box--primary-style u-w-100" id="sub_sub_catagory" name="sub_sub_category">
                                            <option selected disabled>Select Sub-Sub-Category</option>
                                        </select>
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-title">Add Title</label>
                                        <input class="input-text input-text--primary-style" type="text" name="title" id="title" placeholder="Add Title" value="{{old('title')}}">
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-info"> Add Description</label>
                                        <input class="input-text input-text--primary-style" type="text" name="description" id="description" placeholder="Add Description" value="{{old('description')}}">
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="bid-amount">Minimum Bid Amount</label>
                                        <input class="input-text input-text--primary-style" type="number" name="bid_amount" id="bid_amount" placeholder="Enter the minimum bid amount" value="{{old('bid_amount')}}">
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="start-time">Start Of Auction</label>
                                            <input class="input-text input-text--primary-style" type="datetime-local" name="start_time" id="start_time" placeholder="Enter the price" value="{{old('start_time')}}">
                                        </div>

                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="end-time">End Of Auction</label>
                                            <input class="input-text input-text--primary-style" type="datetime-local" name="end_time" id="end_time" placeholder="Enter the price" value="{{old('end_time')}}">
                                        </div>


                                    </div>



                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="">Images</label>
                                        <div class="gl-inline">

                                            <!-- <label class="gl-label" for="e-images1">Image1</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="images1" id="e-images1" placeholder="Enter the price" value="{{old('images1')}}">
                                            <!-- <label class="gl-label" for="e-images2">Image2</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="images2" id="e-images2" placeholder="Enter the price" value="{{old('images2')}}">

                                        </div>
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-15">
                                                <button class="btn btn--e-brand-b-2" type="submit">
                                                    <span>Add Product</span></button>
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

@section('jsscript')

<script type="text/javascript">
    $(document).ready(function() {
        //populating sub categories
        $('#category').change(function() {
            var id = $(this).val();

            $('#sub_catagory').find('option').not(':first').remove();

            //ajax
            $.ajax({
                url: '/get-sub-categories/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;

                            var option = "<option value = '" + id + "'>" + name + "</option>";
                            $('#sub_catagory').append(option);
                        }
                    }
                }
            });
        });
        //populating sub sub categories
        $('#sub_catagory').change(function() {
            var id = $(this).val();

            $('#sub_sub_catagory').find('option').not(':first').remove();

            //ajax
            $.ajax({
                url: '/get-sub-sub-categories/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;

                            var option = "<option value = '" + id + "'>" + name + "</option>";
                            $('#sub_sub_catagory').append(option);
                        }
                    }
                }
            });
        });

    });
</script>

@endsection