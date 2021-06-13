<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubSubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubSubCategory::join('categories', 'sub_sub_categories.category_id', '=', 'categories.id')
        ->join('sub_categories', 'sub_sub_categories.sub_category_id', '=', 'sub_categories.id')
        ->select('sub_categories.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name', 'sub_sub_categories.name as sub_sub_category_name', 'sub_sub_categories.id as sub_sub_category_id')
        ->get();
        return view('admin.sub-sub-categories',['data' => $data]);
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
        $request->validate([
            'category' => 'required|string|max:255',
            'subcategory' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category' => 'required',
        ]);
        $query = DB::table('sub_sub_categories')->insert([
            'category_id' => $request->input('category'),
            'sub_category_id' => $request->input('subcategory'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),

        ]); 
        return redirect('/subsubcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.insert-subsubcategories',[ 'categories' => $categories, 'subcategories' => $subcategories ],);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SubSubCategory::where('id', $id)->get();
        return view('admin.update-subsubcategories',['subsubcategories' => $data]);
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
        $name = $request->input('name');
        $description = $request->input('description');
        SubSubCategory::where('id', $id)->update(['name' => $name, 'description' => $description]);
        
        return redirect('/subsubcategories'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from sub_sub_categories where id=?',[$id]);
        return redirect('/subsubcategories');
    }
}
