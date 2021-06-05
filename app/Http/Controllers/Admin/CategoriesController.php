<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
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


       $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        
    ]);
       $query=DB::table('category')->insert([
        'name'=>$request->input('name'),
        'description'=>$request->input('description')

    ]);  
       return redirect('/categories');

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=new CategoriesController;
        $data= DB::select('select * from category');
        return view('admin.categories',['categories'=>$data]);  
    }

    public function edit($id)
    {
        $data=new CategoriesController;
        $data= DB::select('select * from category where id=?',[$id]);
        return view('admin.update-categories',['categories'=>$data]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
        
        
        DB::update('update category set name = ?,description=? where id = ?',[$name,$description,$id]);

        return redirect('/categories'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        DB::delete('delete from category where id=?',[$id]);
        return redirect('/categories');   
        
    }
}
