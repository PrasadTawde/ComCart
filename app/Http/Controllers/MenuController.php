<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function index(){
        $products = DB::select('select * from products');
        // dd($products);
        return view('shop.grid-products', ['products' => $products]);

    }

    function category($category, $sub_category, $sub_sub_category) {

        $sub_sub_category_id = SubSubCategory::where('name', $sub_sub_category)->select('id')->first();

        if($sub_sub_category_id == null) {
            return view('shop.grid-products', ['products' => null]);
        } else {
            $products = Product::where('sub_sub_category_id', $sub_sub_category_id->id)->get();
                       
            if ($products->isEmpty()) {
                return view('shop.grid-products', ['products' => null]);
            } else {
                return view('shop.grid-products', ['products' => $products]);
            }
        }
    }
}
