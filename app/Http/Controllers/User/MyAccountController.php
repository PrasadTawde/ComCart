<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Account;
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
        $verification_status = UserVerifications::where('user_id', $user_id)->select('status')->first();
        
        $settlement_amount = Account::where('user_id', $user_id)->first();
        
        // dd($user_id, $addresses, $permission, $verification_status, $settlement_amount);

        return view('user.my-account', ['addresses' => $addresses, 'permission' => $permission, 'verification_status' => $verification_status, 'settlement_amount' => $settlement_amount]);
    }
}
