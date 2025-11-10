@extends('layouts.main')

@section('title', 'Products | iPhoneStore')

@section('content')
<div class="container">
  <h3 class="mb-4 text-light">Daftar Produk iPhone</h3>
  <table id="example" class="table table-dark table-striped table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Stok</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $idx => $p)
      <tr>
        <td>{{ $idx + 1 }}</td>
        <td>{{ $p->product_name }}</td>
        <td>{{ $p->description }}</td>
        <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
        <td>{{ $p->stock }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
