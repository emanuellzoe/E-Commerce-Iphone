<?php

namespace App\Http\Controllers;

use App\Ecommerce;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function search()
    {
        $products = Ecommerce::orderBy('id', 'desc')->get();
        return view('search', ['products' => $products]);
    }

    public function actsearch(Request $request)
    {
        $search = $request->input('search');
        $apple = Ecommerce::select('product_name', 'description', 'price')
            ->where('product_name', 'LIKE', '%' . $search . '%')
            ->get();


        return view('/actsearch', ['search' => $apple]);
    }

    public function liveSearch(Request $request)
    {
        $search = $request->input('search');
        
        $products = Ecommerce::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('product_name', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('partials.product_list', ['products' => $products])->render();
    }
}
