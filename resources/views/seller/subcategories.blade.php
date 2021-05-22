@extends('layouts/layout')

@section('main')

<div class="section__content">
    <div class="container">
        <div class="row row--center">
            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                <div class="l-f-o">
                    <div class="l-f-o__pad-box">
                        <h1 class="gl-h1">Add Product</h1>
                        <form class="l-f-o__form">
                            @csrf
                            <!-- </div> -->
                            <div class="u-s-m-b-30" id="subCategory">
                                <div class="u-s-m-b-30" id="Electronics">
                                    <div class="u-s-m-b-30">
                                        
                                        <label class="gl-label" for="sub-catagory">Select Product</label>
                                        <select class="select-box select-box--primary-style u-w-100" id="sub-catagory" name="Elec-catagory">
                                            <option selected>Select</option>
                                            @foreach($subcat as $sCat)
                                            <option value="{{$sCat->sub_category}}">{{$sCat->sub_category}}</option>
                                            @endforeach
                                        </select>


                                        
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-title"> Add Title</label>
                                        <input class="input-text input-text--primary-style" type="text" name="title" id="title" placeholder="Add Title">
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-info"> Add Discription</label>
                                        <input class="input-text input-text--primary-style" type="text" name="info" id="info" placeholder="Add Discription">
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-price">Price</label>
                                        <input class="input-text input-text--primary-style" type="number" name="price" id="price" placeholder="Enter the price">
                                    </div>


                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="">Images</label>
                                        <div class="gl-inline">

                                            <!-- <label class="gl-label" for="e-images1">Image1</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="images1" id="e-images1" placeholder="Enter the price">
                                            <!-- <label class="gl-label" for="e-images2">Image2</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="images2" id="e-images2" placeholder="Enter the price">

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
<!-- 
<script type="text/javascript">
    function myChoice(choice) {
        var cat = document.getElementById('subCategory');
        var childs = cat.childNodes;
        console.log('child', childs[2]);
        var ch = choice.value;
        let i = 0;
        console.log(ch);
        for (i = 1; i < childs.length; i = i + 2) {
            childs[i].style.display = 'none';
        }
        if (ch == 'Electronics') {
            document.getElementById(ch).style.display = "block";

        } else if (ch == 'Furniture') {
            document.getElementById(ch).style.display = "block";

        } else if (ch == 'Vehicle') {
            document.getElementById(ch).style.display = "block";
        } else if (ch == 'Mobile') {
            document.getElementById(ch).style.display = "block";
        } else if (ch == 'Laptop') {
            document.getElementById(ch).style.display = "block";
        } else if (ch == 'Tablet') {
            document.getElementById(ch).style.display = "block";
        }

    }
</script> -->


@endsection