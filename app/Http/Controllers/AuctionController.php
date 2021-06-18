<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\AuctionProductVerifications;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Node\Stmt\Catch_;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=DB::select('select * from auctions');
        return view('/auction/auction-products',['products' =>$products]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('auction.add-auction-product',[ 'categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'sub_sub_category' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'bid_amount' => 'required',
            'images1' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
            'images2' => 'required | mimes:jpeg,jpg,png,JPEG,JPG |max:2048',
        ]);

        $user_id = Auth::user()->id;

        $image1_file = $request->file('images1');
        $image1 = Image::make($image1_file);
        Response::make($image1->encode('jpeg'));
        
        $image2_file = $request->file('images2');
        $image2 = Image::make($image2_file);
        Response::make($image2->encode('jpeg'));
        
        $current_bid_amount=(int)$request->bid_amount;

        try{
            $product = Auction::create([
                'user_id' => $user_id,
                'category_id' => $request->category,
                'sub_category_id'  => $request->sub_category,
                'sub_sub_category_id'  => $request->sub_sub_category,
                'title' => $request->title,
                'description' => $request->description,
                'image_1' => $image1,
                'image_2' => $image2,
                'min_bid_amount' => $request->bid_amount,
                'current_bid_amount' => $current_bid_amount,
                'starting_time' => $request->start_time,
                'ending_time' => $request->end_time,
               
            ]);

            AuctionProductVerifications::create([
                'auction_id' => $product->id,
            ]);
        }
        catch(QueryException $qe){
            If ($qe->errorInfo[0] == "23000" && $qe->errorInfo[1] == "1062"){
                return $qe->errorInfo[2];
            }else{
                return  $qe->errorInfo[2] ;
            } 
        }

        if ($product) {
            return redirect('/add-auction-product')->with('success', 'Product added ');
        } else {
            return redirect('/add-auction-product')->with('fail', 'something went wrong!!!!');
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
        
        $Productdata=new Auction();
        $Productdata=DB::select('select * from auctions where id=?',[$id]);
        $data=(array)$Productdata[0];

        $highest_bid=DB::select("select bids.from from bids where auction_id=? and bid_amount=(select max(bid_amount) from bids)",[$id]);
        if($highest_bid==NULL){
            $high_bid=null;
        }else{
            $hb=(array)$highest_bid[0];
            $highest_bidder=DB::select('select name from users where id = ?',[$hb['from']]);
            $high_bid=$highest_bidder[0];
        }
       
        return view('auction.auction-product-view',['data'=>$data ,'high_bid'=>$high_bid]);
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
        //
    }

   public function fetch_auction_image_1($id) {
        $image = Auction::withTrashed()->findOrFail($id);
        $image_file = Image::make($image->image_1);

        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
    
    public function fetch_auction_image_2($id) {
        $image = Auction::withTrashed()->findOrFail($id);
        $image_file = Image::make($image->image_2);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }

    public function bid(Request $req,$id,$bid_amount){
    
    //    $req->validate(
    //      [  'bid-amount' => 'requred']
    //    );
       $user_id=Auth::user()->id;
       $amount=$bid_amount+$req->input('bid-amount');
        if(DB::select('select id from bids where bids.from=?',[$user_id])){
        $query=DB::update('update bids set bid_amount=?',[$amount]);       
        }
        else{
       $query= DB::table('bids')->insert([ 
            'auction_id' => $id,
            'from' => $user_id,
            'bid_amount' => $amount
        ]);
    }

        if($query){
            DB::update('update auctions set current_bid_amount=? where id=?',[$amount,$id]);
            return redirect('auction-products');
        }

    }

}
