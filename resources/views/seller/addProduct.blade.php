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
                            <div class="u-s-m-b-30 ">

                                <label class="gl-label" for="gender">Catagory</label>
                                <!-- <select class="select-box select-box--primary-style u-w-100" id="catagory" name="category" onclick="myChoice(this)  ">
                                <option selected>Select</option> -->


                                @foreach($category as $cat)
                                <div class="u-s-m-b-15">
                                    <button class="gl-s-api__btn gl-s-api__btn--fb" type="button" onclick="location.href='/subCategories/{{$cat->id}}/{{$cat->category}}';"><i class="fab "></i>

                                        <span>{{$cat->category}}</span></button>
                                </div>

                                <!-- <option value="{{$cat->category}}">{{$cat->category}}</option> -->
                                <!-- <option selected>Select</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Vehicle"> Vehicle</option>
                                    <option value="Mobile-accessories">Mobile & Accessories</option> -->
                                @endforeach



                                </select>

                            </div>

                            <!-- </div> -->
                            <div class="u-s-m-b-30" id="subCategory">
                                <div class="u-s-m-b-30" id="Electronics" style="display:none">
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="Elec-catagory">Select device type</label>
                                        <select class="select-box select-box--primary-style u-w-100" id="Elec-catagory" name="Elec-catagory">
                                            <option selected>Select</option>






                                            <!--                                            
                                            <option value="computer-laptop">Computer or laptop</option>
                                            <option value="camera">Camera or lences</option>
                                            <option value="kitchen">Kitchen Appliances</option>
                                            <option value="fridge">Fridge</option>
                                            <option value="Tv">TV</option>
                                            <option value="Washing-machine">Washing Machine</option>
                                            <option value="computer-accessories">Computer Accessories</option> -->

                                        </select>
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-title"> Add Title</label>
                                        <input class="input-text input-text--primary-style" type="text" name="e-title" id="e-title" placeholder="Add Title">
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-info"> Add Discription</label>
                                        <input class="input-text input-text--primary-style" type="text" name="info" id="e-info" placeholder="Add Discription">
                                    </div>

                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="e-price">Price</label>
                                        <input class="input-text input-text--primary-style" type="number" name="e-price" id="e-price" placeholder="Enter the price">
                                    </div>


                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="">Images</label>
                                        <div class="gl-inline">

                                            <!-- <label class="gl-label" for="e-images1">Image1</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="e-images1" id="e-images1" placeholder="Enter the price">
                                            <!-- <label class="gl-label" for="e-images2">Image2</label> -->
                                            <input class="input-text input-text--primary-style" type="file" name="e-images2" id="e-images2" placeholder="Enter the price">

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