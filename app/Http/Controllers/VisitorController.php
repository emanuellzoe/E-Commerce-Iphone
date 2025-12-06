<?php

namespace App\Http\Controllers;

use App\Ecommerce;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function search()
    {
        return view('search');
    }

    public function actsearch(Request $request)
    {
        $search = $request->input('search');
        $apple = Ecommerce::select('product_name', 'description', 'price')
            ->where('product_name', 'LIKE', '%' . $search . '%')
            ->get();


        return view('/actsearch', ['search' => $apple]);
    }
}
