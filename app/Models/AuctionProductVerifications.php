<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionProductVerifications extends Model
{
    use HasFactory;
    protected $table='product_verifications';
    protected $fillable = [
        'auction_id',
    ];
}
