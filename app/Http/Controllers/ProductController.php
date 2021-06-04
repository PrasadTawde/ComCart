<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('sell.select-category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $category)
    {
        $sub_categories = SubCategory::where('id', $id)->get();
        return view('sell.add-product',['sub_categories' => $sub_categories , 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subCategory' => 'required',
            'title' => 'required',
            'info' => 'required',
            'price' => 'required',
            'images1' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
            'images2' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
        ]);
        $categoryId = DB::select('select DISTINCT id from categories where name  = ?', [$request->category]);
        $catID = (array)$categoryId[0];
          
        $SubCategoryId = DB::select('select id from sub_categories where name = ?', [$request->subCategory]);
        $subCatID = (array)$SubCategoryId[0];

        $user_id = Auth::user()->id;
        $image1_file = $request->file('images1');
        $image1 = Image::make($image1_file);
        Response::make($image1->encode('jpeg'));
        


        $image2_file = $request->file('images2');
        $image2 = Image::make($image2_file);
        Response::make($image2->encode('jpeg'));
        try{
            $product=DB::table('products')->insert([
                'user_id' => $user_id,
                'category_id' => $catID['id'],
                'sub_category_id'  => $subCatID['id'],
                'title' => $request->input('title'),
                'description' => $request->input('info'),
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
            return redirect('/sell')->with('success', 'Product added ');
        } else {
            return redirect('/sell')->with('fail', 'something went wrong!!!!');
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