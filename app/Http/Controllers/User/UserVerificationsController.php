<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Models\UserVerifications;


class UserVerificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserVerifications::join('users', 'user_verifications.user_id', '=', 'users.id')
        ->select('user_verifications.*', 'users.*', 'user_verifications.id as verify_id')
        ->get();

        return view('admin.user-verify',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_verifications = DB::table('user_verifications')->get();
        return view('user.user-verification', ['user_verifications' => $user_verifications]);
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
            'date_of_birth' => 'required|string|max:10',
            'document_type' => 'required',
            'phone_no' => 'required|string|max:10',
            'identification_no' => 'required|string|max:10',
        ]);

        $UserVerification = new UserVerifications;
        $UserVerification->user_id = Auth::user()->id;
        $UserVerification->date_of_birth = $request->date_of_birth;
        $UserVerification->document_type = $request->document_type;
        $UserVerification->phone_no = $request->phone_no;
        $UserVerification->identification_no = $request->identification_no;
        $UserVerification->save();

        $user = User::findOrFail(Auth::user()->id);
        $user->attachPermission('auctioneer');

        if ($UserVerification) {
            return redirect('/my-account');  
        } else {
            $user->detachPermissions('auctioneer');
            return redirect('/my-account');  
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
        $users = UserVerifications::join('users', 'user_verifications.user_id', '=', 'users.id')
        ->where('user_verifications.id', $id)
        ->select('user_verifications.*', 'users.*', 'user_verifications.id as verify_id')
        ->get();

        return view('admin.user-verify-update',['users' => $users]);
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
        $request->validate([
            'status' => 'required|string',
            'remarks' => 'nullable|string|max:255',
        ]);

        $name = $request->input('name');
        $description = $request->input('description');
        UserVerifications::where('id', $id)->update(['status' => $request->status, 'remark' => $request->remarks]);
        
        return redirect('/user-verify'); 
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
