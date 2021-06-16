<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;

class FetchController extends Controller
{
    public function getSubCategories($id){
        $sub_category_data['data'] = SubCategory::select('id','name')
            ->where('category_id',$id)
            ->get();

        return response()->json($sub_category_data);
    }

    public function getSubSubCategories($id){
        $sub_sub_category_data['data'] = SubSubCategory::select('id','name')
            ->where('sub_category_id',$id)
            ->get();

        return response()->json($sub_sub_category_data);
    }

    public function fetch_auction_image_1($id)
    {
        $image = Auction::findOrFail($id);
        $image_file = Image::make($image->image_1);

        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
    public function fetch_auction_image_2($id)
    {
        $image = Auction::findOrFail($id);
        $image_file = Image::make($image->image_2);

        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
}
