<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $table="auctions";
    protected $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
        'sub_sub_category_id',
        'title',
        'description',
        'image_1',
        'image_2',
        'min_bid_amount',
        'current_bid_amount',
        'starting_time',
        'ending_time',
    ];
}
