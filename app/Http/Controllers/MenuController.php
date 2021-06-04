<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    function category($category) {
        $sub_category = str_replace('-', ' ', $category);

        $sub_category_id = DB::table('sub_categories')->where('name', $sub_category)->select('id')->first();
        
        if($sub_category_id == null) {
            return view('shop.grid-products', ['products' => null]);
        } else {
            $products = Product::where('sub_category_id', $sub_category_id->id)->get();
                       
            if ($products->isEmpty()) {
                return view('shop.grid-products', ['products' => null]);
            } else {
                return view('shop.grid-products', ['products' => $products]);
            }
        }
    }
}
