@extends('layouts.main')

@section('title', 'Daftar Orderan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3 class="text-light m-0">Orderan Masuk</h3>
</div>

<div class="table-responsive">
  <table id="example" class="table outline w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Customer</th>
        <th>Produk</th>
        <th>Metode</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $idx => $o)
      <tr>
        <td class="text-center text-muted">{{ $idx + 1 }}</td>
        <td>
            <div class="text-white font-weight-500">{{ $o->created_at->format('d M Y') }}</div>
            <div class="small text-muted">{{ $o->created_at->format('H:i') }} WIB</div>
        </td>
        <td>
            <div class="font-weight-bold text-white">{{ $o->customer_name }}</div>
            <div class="small text-muted text-truncate" style="max-width: 200px;">{{ $o->customer_address }}</div>
        </td>
        <td>
            @if($o->product)
                <div class="text-white">{{ $o->product->product_name }}</div>
                <div class="small text-accent">Rp {{ number_format($o->product->price, 0, ',', '.') }}</div>
            @else
                <span class="text-danger italic">Produk Dihapus</span>
            @endif
        </td>
        <td>
            @if($o->delivery_option == 'delivery')
                <div class="badge badge-primary px-3 py-2 rounded-pill" style="background: rgba(41, 151, 255, 0.15); color: #2997ff; border: 1px solid rgba(41, 151, 255, 0.3);">Delivery</div>
            @else
                <div class="badge badge-warning px-3 py-2 rounded-pill" style="background: rgba(255, 193, 7, 0.15); color: #ffc107; border: 1px solid rgba(255, 193, 7, 0.3);">Pickup</div>
            @endif
        </td>
        <td>
            <span class="badge badge-secondary px-3 py-2 rounded-pill" style="background: rgba(255, 255, 255, 0.1); border: 1px solid #444;">{{ strtoupper($o->status) }}</span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection