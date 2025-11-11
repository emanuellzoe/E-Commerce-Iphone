@extends('layouts.main')

@section('title', 'Products')

@section('content')
<div class="container-fluid">
  <h3 class="mb-4 text-light">Daftar Produk iPhone</h3>

  <table id="example" class="table table-dark table-striped table-hover w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Gambar</th>
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
        <td>
          @if ($p->image)
            <img src="{{ asset('storage/products/' . $p->image) }}"
                 alt="{{ $p->product_name }}"
                 class="img-thumbnail bg-transparent border-0 p-0"
                 style="max-width:90px;">
          @else
            <img src="{{ asset('storage/products/no-image.jpg') }}"
                 alt="No Image"
                 class="img-thumbnail bg-transparent border-0 p-0"
                 style="max-width:90px;">
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
