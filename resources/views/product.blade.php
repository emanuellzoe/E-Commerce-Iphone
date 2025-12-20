@extends('layouts.main')

@section('title', 'Products')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="text-light m-0">Produk</h3>
      <a href="/product/addform" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
  </div>

  <!-- pop up -->
  @if (session('alert-message'))
    @php
        $alertType = session('alert-type', 'info');
        $alertBg = ($alertType == 'success') ? 'rgba(40,167,69,0.2)' : 'rgba(220,53,69,0.2)';
        $alertBorder = ($alertType == 'success') ? '#28a745' : '#dc3545';
    @endphp
    <div class="alert alert-{{ $alertType }} alert-dismissible fade show" role="alert" style="background: {{ $alertBg }}; border: 1px solid {{ $alertBorder }}; color: #fff;">
        <strong>{{ session('alert-message') }}</strong>
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
          <tr style="background-color: #2c2c2e !important; border-bottom: 4px solid #000;">
            <td class="text-center text-muted">{{ $idx + 1 }}</td>
            <td>
              @if ($p->image)
                <img src="{{ asset('storage/products/' . $p->image) }}"
                     alt="{{ $p->product_name }}"
                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 12px; border: 1px solid #444;">
              @else
                <img src="{{ asset('storage/products/no-image.jpg') }}"
                     alt="No Image"
                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 12px; border: 1px solid #444;">
              @endif
            </td>
            <td>
                <div class="font-weight-bold" style="color: #e4e4e4;">{{ $p->product_name }}</div>
                <div class="small text-muted text-truncate" style="max-width: 200px;">{{ $p->description }}</div>
            </td>
            <td style="color: #e4e4e4;">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td>
                @if($p->stock <= 5)
                    <span class="badge badge-danger">Sisa {{ $p->stock }}</span>
                @else
                    <span class="text-muted font-weight-bold">{{ $p->stock }}</span>
                @endif
            </td>
            <td class="text-right">
              <a href="/product/edit/{{ $p->id }}" class="btn btn-outline-secondary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center" title="Edit" style="width: 40px; height: 40px; padding: 0;"> <i class="bi bi-pencil"></i></a>
              <button class="btn btn-outline-danger btn-sm rounded-circle d-inline-flex align-items-center justify-content-center" title="Delete" data-toggle="modal" data-target="#deleteModal" data-url="/product/delete/{{ $p->id }}" style="width: 40px; height: 40px; padding: 0;">
                  <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
@endsection
