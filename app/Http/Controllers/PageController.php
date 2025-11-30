<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\User;
use App\Ecommerce; // pastikan model ini sudah ada di folder App
use Illuminate\Support\Facades\Auth;

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

    public function productSave(Request $request)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('products', $imageName, 'public');
    }

    Ecommerce::create([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imageName,
    ]);

    return redirect('/product')->with('alert', 'Produk berhasil ditambahkan!');
}
    public function productEdit($id)
    {
        $product = Ecommerce::find($id);
        return view('productEdit', ['product' => $product]);
    }

    public function productDelete($id)
    {
        $product = Ecommerce::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();

        return redirect('/product')->with('alert', 'Produk berhasil dihapus!');
    }

    public function productUpdate(Request $request, $id)
{
    // validasi input
    $request->validate([
        'product_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:10048',
    ]);

    $product = Ecommerce::find($id);

    // update fields yang bukan file
    $product->product_name = $request->product_name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->stock = $request->stock;

    // jika ada file baru, hapus file lama lalu simpan file baru
    if ($request->hasFile('image')) {
        // hapus gambar lama jika ada
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        // simpan file baru
        $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('products', $imageName, 'public');

        // set nama file ke model
        $product->image = $imageName;
    }

    $product->save();

    return redirect('/product')->with('alert', 'Produk berhasil diperbarui!');
}
    public function users()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('users', ['key' => 'users', 'users' => $users]);
    }

    public function userAddForm()
    {
        return view('usersaddform');
    }

    public function userSave(Request $request)
    {
        if($request->hasFile('photo'))
        {
            $file_name = time().'-'.$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('photo', $file_name,'public');
        } else
        {
            $file_name = null;
            $path = null;
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => $file_name
        ]);
        return redirect('/users') -> with('alert', 'New user has been added!');
    }

    public function usersDeleteForm($id)
    {
        $users = User::find($id);
        if ($users->photo) {
            Storage::disk('public')->delete('photo/'.$users->photo);
        }
        $users->delete();
        return redirect('/users') -> with('alert', 'User has been deleted!');
    }

    public function setting()
    {
        return view('setting', ['key' => 'user']);
    }

    public function updatepass(Request $request)
    {
        $user = Auth::user();

        if (!Auth::attempt([
            'email' => $user->email,
            'password' => $request->password_lama
        ])) {
            return redirect('/setting');
        }

        $user->update([
            'password' => bcrypt($request->password_baru),
        ]);

        return redirect('/users')->with('alert','berhasil update password');
    }

}
