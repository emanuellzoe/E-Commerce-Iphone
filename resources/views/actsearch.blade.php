<!doctype html>
<html lang="en">
<head>
  <title>Search Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 bg-info py-4"></div>
    </div>
  </div>

  <div class="container my-4">
    {{-- $search di sini diasumsikan berisi collection hasil query Ecommerce --}}
    @if(isset($search) && $search->count())
      <div class="row">
        @foreach ($search as $s)
          <div class="col-sm-6 col-md-4 mb-4">
            <div class="card h-100">

              {{-- Gambar produk --}}
              @if (!empty($s->image))
                <img src="{{ asset('storage/photo/'.$s->image) }}"
                     alt="{{ $s->product_name }}" class="card-img-top"
                     style="height:200px; object-fit:cover;">
              @else
                <img src="{{ asset('storage/photo/no-image.png') }}"
                     alt="No Image" class="card-img-top"
                     style="height:200px; object-fit:cover;">
              @endif

              <div class="card-body">
                {{-- Nama produk --}}
                <h5 class="card-title mb-1">{{ $s->product_name }}</h5>

                {{-- Deskripsi --}}
                <p class="mb-2 text-muted">
                  {{ $s->description }}
                </p>

                {{-- Harga --}}
                <small class="text-secondary font-weight-bold">
                  Rp {{ number_format($s->price, 0, ',', '.') }}
                </small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">No results found.</div>
    @endif
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
</body>
</html>
