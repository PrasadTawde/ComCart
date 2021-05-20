<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\userProfileModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class userProfileController extends Controller
{
     function profile($id){

    	$userData=new userProfileModel;
        $userData= DB::select('select * from users where id = ?',[$id]);

    	return view('profile.dash-my-profile',['users'=>$userData]);
    }


 //update user data
    function showData($id){

        $data= DB::select('select * from users where id = ?',[$id]);
        return view('edit',['users'=>$data]);
              


    }

function updateData(Request $request,$id){

        $id = $request->input('id');

        $name = $request->input('name');
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');
        $gender = $request->input('gender');
       
        DB::update('update users set name = ?,email=?,phone_no=?,gender=? where id = ?',[$name,$email,$phone_no,$gender,$id]);

        return redirect('dash-my-profile/5');
        // return redirect()->route('profile',[$customer_id]);


    }
}
