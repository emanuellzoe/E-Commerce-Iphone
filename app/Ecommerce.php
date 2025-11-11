<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecommerce extends Model
{
    protected $table = 'ecommerce';
    protected $fillable = ['product_name', 'description', 'price', 'stock', 'image'];

}
