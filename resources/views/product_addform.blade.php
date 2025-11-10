@extends('layouts.main')

@section('title', 'Add Product | iPhoneStore')

@section('content')
<div class="container">
  <h3 class="mb-4 text-light">Tambah Produk Baru</h3>
  <form action="{{ url('/product/save') }}" method="POST">
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
      <input type="number" name="price" id="price" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="stock">Stok</label>
      <input type="number" name="stock" id="stock" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
  </form>
</div>
@endsection
