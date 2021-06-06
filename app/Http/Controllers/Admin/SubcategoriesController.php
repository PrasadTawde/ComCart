<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new SubcategoriesController;
        $data = DB::table('sub_categories')
        ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
        ->select('sub_categories.*', 'categories.name as category_name')
        ->get();
        return view('admin.sub-categories',['subcategories'=>$data]);


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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required',


        ]);
        $query=DB::table('sub_categories')->insert([
            'name'=>$request->input('name'),
            'category_id'=>$request->input('category'),
            'description'=>$request->input('description'),

        ]); 
        return redirect('/subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=new SubcategoriesController;
        $data= DB::select('select * from categories');
        return view('admin.insert-subcategories',['subcategories'=>$data],);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = new SubcategoriesController;
        $data = DB::select('select * from sub_categories where id=?',[$id]);
        return view('admin.update-subcategories',['subcategories' => $data]);
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
        DB::update('update sub_categories set name = ?,description=? where id = ?',[$name, $description, $id]);

        return redirect('/subcategories'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from sub_categories where id=?',[$id]);
        return redirect('/subcategories');    

    }
}
