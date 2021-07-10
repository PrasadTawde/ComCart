<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Addresses;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = DB::table('user_addresses')->where('user_id', Auth::user()->id)->get();
        return view('user.address', ['addresses'=> $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table('states')->get();
        return view('user.address-add', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:10',
            'street_address' => 'required|string|max:255',
            'state' => 'required|string',
            'city' => 'required|string|max:255',
            'pincode' => 'required|numeric|',
            'address_type' => 'required|string|max:255',
        ]);
        
        $address = new Addresses;
        $address->user_id = Auth::user()->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone_no = $request->phone_no;
        $address->address = $request->street_address;
        $address->country = 'india';
        $address->state = $request->state;
        $address->city = $request->city;
        // $address->locality = $request->city;
        $address->pincode = $request->pincode;
        $address->type = $request->address_type;

        $address->save();
        return redirect('/address');
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
        $address = DB::table('user_addresses')->where('id', $id)->get();
        $states = DB::table('states')->get();
        return view('user.address-edit', ['address'=> $address, 'states' => $states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:10',
            'street_address' => 'required|string|max:255',
            'state' => 'required|string',
            'city' => 'required|string|max:255',
            'pincode' => 'required|numeric|',
            'address_type' => 'required|string|max:255',
        ]);

        $address = Addresses::find($id);
        $address->user_id = Auth::user()->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone_no = $request->phone_no;
        $address->address = $request->street_address;
        $address->state = $request->state;
        $address->city = $request->city;
        // $address->locality = $request->city;
        $address->pincode = $request->pincode;
        $address->type = $request->address_type;
        
        $address->save();
        return redirect('/address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user_addresses')->where('id', '=', $id)->delete();
        return redirect('/address');
    }
}
