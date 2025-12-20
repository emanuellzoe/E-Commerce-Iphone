@extends('layouts.main')

@section('title', 'Daftar Orderan')

@section('content')
<div class="container-fluid">
  <h3 class="mb-4 text-light">Daftar Orderan Masuk</h3>

  <table id="example" class="table table-dark table-striped table-hover w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Customer</th>
        <th>Produk</th>
        <th>Harga</th>
        <th>Pengiriman</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $idx => $o)
      <tr>
        <td>{{ $idx + 1 }}</td>
        <td>{{ $o->created_at->format('d M Y H:i') }}</td>
        <td>
            <div class="font-weight-bold">{{ $o->customer_name }}</div>
            <small class="text-muted">{{ $o->customer_address }}</small>
        </td>
        <td>
            @if($o->product)
                {{ $o->product->product_name }}
            @else
                <span class="text-danger">Produk Dihapus</span>
            @endif
        </td>
        <td>
            @if($o->product)
                Rp {{ number_format($o->product->price, 0, ',', '.') }}
            @else
                -
            @endif
        </td>
        <td>
            @if($o->delivery_option == 'delivery')
                <span class="badge badge-info">Delivery</span>
            @else
                <span class="badge badge-warning">Pickup</span>
            @endif
        </td>
        <td>
            <span class="badge badge-secondary">{{ strtoupper($o->status) }}</span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
