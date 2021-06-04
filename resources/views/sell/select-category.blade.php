@extends('layouts/layout')

@section('main')

<div class="section__content">
    <div class="container">
        <div class="row row--center">
            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                <div class="l-f-o">
                    <div class="l-f-o__pad-box">
                        @if(Session::get('success'))
                        <div class="alert"  style ="background: rgba(0, 128, 0, 0.3) ">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        @if(Session::get('fail'))
                        <div class="alert " style ="background: rgba(128, 0, 0, 0.3) ">
                            {{Session::get('fail')}}
                        </div>
                        @endif

                        <h1 class="gl-h1">Add Product</h1>
                        <form class="l-f-o__form">
                            @csrf
                            <div class="u-s-m-b-30 ">
                                <h2 class="gl-h1">Select Category</h2>

                                @foreach($categories as $category)
                                <div class="u-s-m-b-15">
                                <button class="gl-s-api__btn gl-s-api__btn--fb" type="button" onclick="location.href='/sell/{{ $category->id }}/{{ $category->name }}';"><i class="fab "></i>

                                 <span>{{ $category->name }}</span></button>
                                </div>
                                @endforeach
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