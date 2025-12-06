<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ecommerce;


class ProductController extends Controller
{
    public function product()
    {
        $products = Ecommerce::orderBy("id", "desc")->get();
        return response()->json(
            [
                'success' => true,
                'message' => 'List Semua Produk',
                'data'    => $products
            ],
            200
        );
    }
}
