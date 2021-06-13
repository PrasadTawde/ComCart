<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

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
}
