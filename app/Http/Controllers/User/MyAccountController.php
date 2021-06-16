<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\UserVerifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $addresses = Addresses::where('user_id', $user_id)->first();
        $permission = Auth::user()->hasPermission('auctioneer');
        $vefication_status = UserVerifications::where('user_id', $user_id)->select('status')->first();
        
       //  dump($vefication_status);
        return view('user.my-account', ['addresses' => $addresses, 'permission' => $permission, 'vefication_status' => $vefication_status]);
    }
}
