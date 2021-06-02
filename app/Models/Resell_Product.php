<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resell_Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'cat_id',
        'subcat_id',
        'title',
        'discription',
        'price',
        'image_1',
        'image_2'
    ];
}
