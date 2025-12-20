<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id', 'customer_name', 'customer_address', 'delivery_option', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Ecommerce::class, 'product_id');
    }
}
