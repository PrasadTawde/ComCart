<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\ProductVerifications;
use App\Models\AuctionProductVerifications;



class ProductVerificationsController extends Controller
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
        $product_verifications = DB::table('product_verifications')->get();
        return view('admin.product-verification', ['product_verifications' => $product_verifications]);  
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
          $request->validate([
            
            'status' => 'required|string|max:255',
            'remark' => 'required|string|max:255',
        ]);
        


        $ProductVerification = new ProductVerifications;
        $ProductVerification->auction_id = $id;
        $ProductVerification->status = $request->status;
        $ProductVerification->remark = $request->remark;
        $ProductVerification->save();
        return redirect('/auction-product-verification');      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $auctions = Auction::join('product_verifications', 'product_verifications.auction_id', '=', 'auctions.id')
        ->select('auctions.*', 'product_verifications.*',)
        ->get();

        return view('admin.auction-product-verification',['auctions'=>$auctions]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from auctions where id=?',[$id]);
        return redirect('/auction-product-verification');  
    }
}
