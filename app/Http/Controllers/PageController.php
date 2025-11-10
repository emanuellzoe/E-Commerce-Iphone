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
        $products = Ecommerce::all(); // ambil semua data produk dari tabel ecommerce
        return view('product', ['products' => $products]);
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

        // setelah simpan, arahkan kembali ke halaman daftar produk
        return redirect('/product')->with('success', 'Produk berhasil ditambahkan!');
    }
}
