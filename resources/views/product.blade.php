@extends('layouts.main')

@section('title', 'Products')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0 text-light">Daftar Produk iPhone</h5>
      <a href="{{ url('/product/addform') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i> Add Product</a>
    </div>

    <div class="card-body">
      <table id="example" class="table table-dark table-striped table-hover" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
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
                  <img src="{{ asset('storage/products/' . $p->image) }}" alt="{{ $p->product_name }}" class="img-thumbnail" style="max-width:100px;">
                @else
                  <img src="{{ asset('storage/products/no-image.jpg') }}" alt="No Image" class="img-thumbnail" style="max-width:100px;">
                @endif
              </td>
              <td>
                <a href="{{ url('/product/edit/'.$p->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>

                <!-- lebih aman gunakan form POST + method DELETE, tapi contoh GET -->
                <form action="{{ url('/product/delete/'.$p->id) }}" method="POST" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">
                    <i class="bi bi-trash3"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
