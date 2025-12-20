<!doctype html>
<html lang="en">
<head>
    <title>{{ $product->product_name }} - Detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #121212;
            color: #e6e6e6;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
        }
        .breadcrumb {
            background-color: transparent;
            padding-left: 0;
        }
        .breadcrumb-item a {
            color: #17a2b8;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6 mb-4">
                <div class="card p-3 d-flex align-items-center justify-content-center" style="min-height: 400px;">
                    @if ($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}" 
                             alt="{{ $product->product_name }}" 
                             class="img-fluid" 
                             style="max-height: 400px; border-radius: 10px;">
                    @else
                        <img src="{{ asset('storage/products/no-image.jpg') }}" 
                             alt="No Image" 
                             class="img-fluid" 
                             style="max-height: 400px;">
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <h1 class="text-light mb-2">{{ $product->product_name }}</h1>
                
                <h3 class="text-info mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                <div class="mb-4">
                    <span class="badge badge-secondary p-2">Stok: {{ $product->stock }}</span>
                </div>

                <div class="mb-4">
                    <h5 class="text-light">Deskripsi:</h5>
                    <p class="text-white-50" style="line-height: 1.6;">
                        {{ $product->description }}
                    </p>
                </div>

                <!-- Alert -->
                @if (session('alert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <hr class="border-secondary">

                <!-- Action Buttons -->
                <div class="mt-4">
                    <h5 class="mb-3 text-light">Tertarik?</h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-2">
                             <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#orderModal">
                                <i class="bi bi-cart-fill"></i> Beli Sekarang
                            </button>
                        </div>
                        <div class="col-md-6 mb-2">
                            @php
                                $message = "Halo Admin, saya ingin bertanya detail tentang produk *" . $product->product_name . "* seharga Rp " . number_format($product->price, 0, ',', '.') . ".";
                                $wa_link = "https://wa.me/6281234567890?text=" . urlencode($message);
                            @endphp
                            <a href="{{ $wa_link }}" target="_blank" class="btn btn-outline-success btn-lg btn-block">
                                <i class="bi bi-whatsapp"></i> Chat Admin
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Order -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #1e1e1e; color: #fff; border: 1px solid #333;">
          <div class="modal-header border-secondary">
            <h5 class="modal-title" id="orderModalLabel">Form Pemesanan</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/order/save') }}" method="POST">
              @csrf
              <div class="modal-body">
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  
                  <div class="form-group">
                      <label for="customer_name">Nama Lengkap</label>
                      <input type="text" class="form-control bg-dark text-white border-secondary" id="customer_name" name="customer_name" required>
                  </div>

                  <div class="form-group">
                      <label for="customer_address">Alamat Lengkap</label>
                      <textarea class="form-control bg-dark text-white border-secondary" id="customer_address" name="customer_address" rows="3" required></textarea>
                  </div>

                  <div class="form-group">
                      <label>Opsi Pengiriman</label>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="delivery_option" id="delivery" value="delivery" checked>
                          <label class="form-check-label" for="delivery">
                              Diantar ke Alamat (Delivery)
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="delivery_option" id="pickup" value="pickup">
                          <label class="form-check-label" for="pickup">
                              Ambil di Toko (Pickup)
                          </label>
                      </div>
                  </div>
              </div>
              <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
