<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
     function profile($id){

    	$userData=new UserProfile;
        $userData= DB::select('select * from users where id = ?',[$id]);

    	return view('user.profile',['users'=>$userData]);
    }


 //update user data
    function show($id){

        $data= DB::select('select * from users where id = ?',[$id]);
        return view('edit',['users'=>$data]);
              


    }

function update(Request $request,$id){

        $id = $request->input('id');

        $name = $request->input('name');
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');
        $gender = $request->input('gender');
       
        DB::update('update users set name = ?,email=?,phone_no=?,gender=? where id = ?',[$name,$email,$phone_no,$gender,$id]);

        return redirect('profile/5');
        // return redirect()->route('profile',[$customer_id]);


    }
}
