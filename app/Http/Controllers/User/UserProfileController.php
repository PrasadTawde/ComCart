<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

use Auth;

class UserProfileController extends Controller
{
     function profile(){
    	$user_data=new UserProfile;
        $user_data= DB::select('select * from users where id = ?',[Auth::user()->id]);
    	return view('user.profile',['users'=>$user_data]);
    }


 //update user data
    function show(){
        $data= DB::select('select * from users where id = ?',[Auth::user()->id]);
        return view('user.profile-edit',['users'=>$data]);
    }

function update(Request $request){

        $id = Auth::user()->id;

        $name = $request->input('name');
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');
        $gender = $request->input('gender');
       
        DB::update('update users set name = ?,email=?,phone_no=?,gender=? where id = ?',[$name,$email,$phone_no,$gender,$id]);

        return redirect('/profile');
    }
}
