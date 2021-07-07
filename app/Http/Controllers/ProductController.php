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
        $user_id = Auth::user()->id;
        $products = DB::select('select * from products where user_id=?', [$user_id]);
        // dd($products);
        return view('sell.my-products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sub_categories = SubCategory::where('id', $id)->get();
        $categories = Category::all();
        return view('sell.add-product',[ 'categories' => $categories ]);
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
            'category' => 'required',
            'sub_category' => 'required',
            'sub_sub_category' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'quantity' => 'required',
            'price' => 'required',
            'images1' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
            'images2' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
        ]);

        $user_id = Auth::user()->id;
        $image1_file = $request->file('images1');
        $image1 = Image::make($image1_file);
        Response::make($image1->encode('jpeg'));
        


        $image2_file = $request->file('images2');
        $image2 = Image::make($image2_file);
        Response::make($image2->encode('jpeg'));
        try{
            $product = DB::table('products')->insert([
                'user_id' => $user_id,
                'category_id' => $request->input('category'),
                'sub_category_id'  => $request->input('sub_category'),
                'sub_sub_category_id'  => $request->input('sub_sub_category'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity'),
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
        $data = DB::select('select Distinct * from products where id=?', [$id]);

        return view('/sell/edit-product-details', ['data' => $data]);
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
        $request->validate([
            // 'subCategory' => 'required',
            'title' => 'required',
            'info' => 'required',
            'price' => 'required',
            'quantity' => 'required',

            // 'images1' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
            // 'images2' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
        ]);


        if (($request->file('images1')!=NULL) && ($request->file('images2')!=NULL)) {
            $image1_file = $request->file('images1');
            $image1 = Image::make($image1_file);
            Response::make($image1->encode('jpeg'));
            $image2_file = $request->file('images2');
            $image2 = Image::make($image2_file);
            Response::make($image2->encode('jpeg'));
            $query=DB::update('update products set title = ?,description=?,quantity=?,price=?,image_1=?,image_2=? where id=?',[$request->title,$request->info,$request->quantity,$request->price,$image1,$image2,$id]);

            if ($query) {
                return redirect('/my-products')->with('success', 'Product details updated  ');
            } else {
                return redirect('/my-products')->with('fail', 'something went wrong!!!!');
            }

        } else if (($request->file('images1')!=NULL)) {
            $image1_file = $request->file('images1');
            $image1 = Image::make($image1_file);
            Response::make($image1->encode('jpeg'));
            $query=DB::update('update products set title = ?,description=?,quantity=?,price=?,image_1=? where id = ?',[$request->title,$request->info,$request->quantity,$request->price,$image1,$id]);

            if ($query) {
                return redirect('/my-products')->with('success', 'Product details updated  ');
            } else {
                return redirect('/my-products')->with('fail', 'something went wrong!!!!');
            }

        } else if (($request->file('images2')!=NULL)) {
            $image2_file = $request->file('images2');
            $image2 = Image::make($image2_file);
            Response::make($image2->encode('jpeg'));
            $query=DB::update('update products set title = ?,description=?,quantity=?,price=?,image_2=? where id=?',[$request->title,$request->info,$request->quantity,$request->price,$image2,$id]);
            
            if ($query) {
                return redirect('/my-products')->with('success', 'Product details updated  ');
            } else {
                return redirect('/my-products')->with('fail', 'something went wrong!!!!');
            }
        }
        else if(($request->file('images1')==NULL) && ($request->file('images2')==NULL)){
            $query=DB::update('update products set title = ?,description=?,quantity=?,price=? where id= ?',[$request->title,$request->info,$request->quantity,$request->price,$id]);
            if ($query) {
                return redirect('/my-products')->with('success', 'Product details updated  ');
            } else {
                return redirect('/my-products')->with('fail', 'something went wrong!!!!');
            }
        }
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
        DB::delete('delete from products where id=?',[$id]);
        
        $user_id = Auth::user()->id;
        $products = DB::select('select * from products where user_id=?', [$user_id]);
        
        return view('sell.my-products', ['products' => $products]);
    }

    public function search(Request $req)
    {
        $result = DB::table('products')->where('title', 'like', '%' . $req->input('search') . '%')->get();
        $d = (array)$result[0];
        $cat = DB::table('categories')->where('id', $d['category_id'])->get();
        $category = (array)$cat[0];
        return view('search.search-result', ['result' => $result, 'category' => $category]);
    }

    public function sort(Request $req)
    {
        if($req->get('sort')==='latest'){
            
        }else if($req->get('sort')==='bestSelling'){

        }else if($req->get('sort')==='bestRating'){

        }else if($req->get('sort')==='lowestPrice'){

        }else  if($req->get('sort')==='highestPrice'){

        }

    }
}

