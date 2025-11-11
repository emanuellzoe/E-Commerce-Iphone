<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ecommerce; // pastikan model ini sudah ada di folder App

class PageController extends Controller
{
    // Halaman utama (Home)
    public function home()
    {
        return view('home', ['key' => 'home']);
    }

    // Halaman daftar produk
    public function product()
{
    // Ambil data dari database, urutkan berdasarkan ID terbaru (descending)
    $products = Ecommerce::orderBy('id', 'desc')->get();

    return view('product', ['key' => 'product', 'products' => $products]);
}


    // Halaman form tambah produk
    public function productAddForm()
    {
        return view('product_addform');
    }

    // Fungsi untuk menyimpan produk baru
    public function productSave(Request $request)
    {
        Ecommerce::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        return redirect('/product')->with('success', 'Produk berhasil ditambahkan!');
    }
}
