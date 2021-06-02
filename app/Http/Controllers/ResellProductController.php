<?php

namespace App\Http\Controllers;


use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Resell_Product as ModelsResell_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\QueryException;


class ResellProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'subCategory' => 'required',
            'title' => 'required',
            'info' => 'required',
            'price' => 'required',
            'images1' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
            'images2' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
        ]);
        $categoryId = DB::select('select DISTINCT id from categories where category  = ?', [$request->category]);
        $catID = (array)$categoryId[0];
          
        $SubCategoryId = DB::select('select id from sub_categories where sub_category=?', [$request->subCategory]);
        $subCatID = (array)$SubCategoryId[0];

        $user_id = Auth::user()->id;
        $image1_file = $request->file('images1');
        $image1 = Image::make($image1_file);
        Response::make($image1->encode('jpeg'));
        


        $image2_file = $request->file('images2');
        $image2 = Image::make($image2_file);
        Response::make($image2->encode('jpeg'));
        try{
            $product=DB::table('resell__products')->insert([
                'user_id' => $user_id,
                'cat_id' => $catID['id'],
                'subcat_id'  => $subCatID['id'],
                'title' => $request->input('title'),
                'discription' => $request->input('info'),
                'price' => $request->input('price'),
                'image_1' => $image1,
                'image_2' => $image2
            ]);
        }
        catch(QueryException $qe){
        If ($qe->errorInfo[0] == "23000" && $qe->errorInfo[1] == "1062"){
            return $qe->errorInfo[2];
        }else{
            return  $qe->errorInfo[2] ;
        } 
    }


        if ($product) {
            return redirect('/selectCategory')->with('success', 'Product added ');
        } else {
            return redirect('/selectCategory')->with('fail', 'something went wrong!!!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
