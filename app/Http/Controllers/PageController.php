<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Ecommerce;

class PageController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
    }
}
