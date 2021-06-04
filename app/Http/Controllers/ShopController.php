<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;

class ShopController extends Controller
{
    function index($id) {
        $product = Product::where('id', $id)->get();
        return view('shop.product-view', ['product' => $product]);
    }

    function fetch_image_1($id) {
        $image = Product::findOrFail($id);
        $image_file = Image::make($image->image_1);

        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
    
    function fetch_image_2($id) {
        $image = Product::findOrFail($id);
        $image_file = Image::make($image->image_2);

        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
}
