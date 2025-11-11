@extends('layouts.main')

@section('title', 'Add Product')

@section('content')
<div class="container">
  <h3 class="mb-4 text-light">Tambah Produk Baru</h3>
  <form action="{{ url('/product/save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="product_name">Nama Produk</label>
      <input type="text" name="product_name" id="product_name" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="description">Deskripsi</label>
      <textarea name="description" id="description" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="price">Harga</label>
      <!-- input yang terlihat untuk user (format ada titik) -->
      <input type="text" name="price" id="price" class="form-control" required autocomplete="off" inputmode="numeric" />
      <!-- hidden input yang berisi angka murni untuk dikirim ke server -->
      <input type="hidden" name="price_raw" id="price_raw">
    </div>
    <div class="form-group">
      <label for="stock">Stok</label>
      <input type="number" name="stock" id="stock" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="image">Gambar Produk</label>
      <input type="file" class="form-control" accept="image/*" name="image" id="image">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
  </form>
</div>
@endsection
