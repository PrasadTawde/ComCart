@extends('layouts/layout')

@section('main')

<div class="section__content">
    <div class="container">
        <div class="row row--center">

            <h1 class="gl-h1">My Products</h1>
            <!-- @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif -->
            <table class="table dash__table table-responsive table-full-width ">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image </th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image </th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i=1;?>
                    @foreach($products as $product)
                    
                    <tr>
                        <td> {{$i++}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <div><img src="/fetch_image_1/{{ $product->id }}" alt="" width="100" height="80"></div>
                        </td>
                        <td>
                            <div><img src="/fetch_image_2/{{ $product->id }}" alt="" width="100" height="80"></div>
                        </td>
                        <td><a href="/edit/{{$product->id}}"><i class="fas fa-edit" style="color:green" ></i></a></td>
                        <td><a href="/delete/{{$product->id}}"><i class="fas fa-trash " style="color:red"></i></a></td>
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>


@endsection