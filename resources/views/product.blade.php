@extends('layouts.main')

@section('title', 'Products')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="text-light m-0">Produk</h3>
      <a href="/product/addform" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
  </div>

  <!-- pop up -->
  @if (session('alert'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: rgba(40,167,69,0.2); border: 1px solid #28a745; color: #fff;">
        <strong>{{ session('alert') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif

  <div class="alert mb-4" role="alert" style="background: rgba(255,255,255,0.05); border: 1px solid #333; border-radius: 12px;">
      <small class="text-muted">
          <i class="bi bi-info-circle-fill text-primary"></i> Baris berwarna <span class="badge badge-danger">merah</span> menandakan stok menipis.
      </small>
  </div>

  <div class="table-responsive">
      <table id="example" class="table outline w-100">
        <thead>
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Info Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th class="text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $idx => $p)
          <tr class="{{ $p->stock <= 5 ? 'table-danger' : '' }}" style="{{ $p->stock <= 5 ? 'background: rgba(220,53,69,0.1) !important;' : '' }}">
            <td class="text-center text-muted">{{ $idx + 1 }}</td>
            <td>
              @if ($p->image)
                <img src="{{ asset('storage/products/' . $p->image) }}"
                     alt="{{ $p->product_name }}">
              @else
                <img src="{{ asset('storage/products/no-image.jpg') }}"
                     alt="No Image">
              @endif
            </td>
            <td>
                <div class="font-weight-bold text-white">{{ $p->product_name }}</div>
                <div class="text-muted small text-truncate" style="max-width: 200px;">{{ $p->description }}</div>
            </td>
            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td>
                @if($p->stock <= 5)
                    <span class="badge badge-danger">Sisa {{ $p->stock }}</span>
                @else
                    <span class="text-muted">{{ $p->stock }}</span>
                @endif
            </td>
            <td class="text-right">
              <a href="/product/edit/{{ $p->id }}" class="btn btn-outline-light btn-sm rounded-circle p-2" title="Edit"> <i class="bi bi-pencil"></i></a>
              <a href="/product/delete/{{ $p->id }}" class="btn btn-outline-danger btn-sm rounded-circle p-2" title="Delete" onclick="return confirm('Hapus produk ini?')"> <i class="bi bi-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
@endsection
