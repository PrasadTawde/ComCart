<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resell_product extends Model
{
    use HasFactory;
    protected $fillabele=[
        'user_id',
        'cat_id',
        'subcat_id',
        'location_id',
        'title',
        'discription',
        'price',
        'image_1',
        'image_2'
    ];
}
