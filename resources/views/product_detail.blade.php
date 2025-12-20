<!doctype html>
<html lang="en">
<head>
    <title>{{ $product->product_name }} - Apple Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-body: #000;
            --accent: #0071e3;
            --text-main: #f5f5f7;
            --text-muted: #86868b;
        }
        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
        }
        .navbar-custom { padding: 20px; border-bottom: 1px solid #333; margin-bottom: 40px; }
        .product-image-container {
            background: #151516;
            border-radius: 30px;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 500px;
        }
        .product-image-container img {
            max-height: 100%;
            max-width: 100%;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.5));
        }
        .product-title { font-size: 3rem; font-weight: 700; line-height: 1.1; }
        .product-price { font-size: 2rem; color: var(--text-main); margin-bottom: 20px; }
        .badge-stock { background: #333; color: #fff; padding: 5px 12px; border-radius: 6px; }
        .btn-buy {
            background-color: var(--accent);
            color: white;
            border-radius: 980px;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 500;
            border: none;
            width: 100%;
            transition: 0.3s;
        }
        .btn-buy:hover { background-color: #0077ed; transform: scale(1.02); }
        .btn-outline-wa {
            border: 1px solid #444;
            color: #fff;
            border-radius: 980px;
            padding: 12px 30px;
            font-size: 1.1rem;
            width: 100%;
            transition: 0.3s;
        }
        .btn-outline-wa:hover { border-color: #25D366; color: #25D366; background: transparent; }
        
        /* Modal Styling */
        .modal-content {
            background-color: #1c1c1e;
            color: #fff;
            border-radius: 20px;
            border: 1px solid #333;
        }
        .modal-header { border-bottom: 1px solid #333; }
        .modal-footer { border-top: 1px solid #333; }
        .form-control {
            background-color: #2c2c2e;
            border: none;
            color: white;
            border-radius: 8px;
        }
        .form-control:focus { background-color: #3a3a3c; color: white; box-shadow: none; }
    </style>
</head>

<body>
    <nav class="navbar-custom d-flex justify-content-between align-items-center">
        <a href="/" class="text-white font-weight-bold h5 mb-0"> iPhoneStore</a>
        <a href="/" class="text-muted small">Kembali</a>
    </nav>

    <div class="container pb-5">
        <div class="row align-items-center">
            <!-- Left: Image -->
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="product-image-container">
                    @if ($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->product_name }}">
                    @else
                        <img src="{{ asset('storage/products/no-image.jpg') }}" alt="No Image">
                    @endif
                </div>
            </div>

            <!-- Right: Details -->
            <div class="col-lg-5 pl-lg-5">
                <span class="text-warning small font-weight-bold">BARU</span>
                <h1 class="product-title mb-2">{{ $product->product_name }}</h1>
                <div class="mb-4">
                    <span class="badge-stock">Stok: {{ $product->stock }}</span>
                </div>
                
                <h3 class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                <p class="text-muted mb-5" style="font-size: 1.1rem; line-height: 1.6;">
                    {{ $product->description }}
                </p>

                <!-- Actions -->
                <div class="d-grid gap-3">
                    <button type="button" class="btn btn-buy mb-3" data-toggle="modal" data-target="#orderModal">
                        Beli Sekarang
                    </button>

                    @php
                        $message = "Halo Admin, saya ingin bertanya detail tentang *" . $product->product_name . "*";
                        $wa_link = "https://wa.me/6281234567890?text=" . urlencode($message);
                    @endphp
                    <a href="{{ $wa_link }}" target="_blank" class="btn btn-outline-wa">
                        <i class="bi bi-whatsapp"></i> Tanya via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Order -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Form Pemesanan</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/order/save') }}" method="POST">
              @csrf
              <div class="modal-body p-4">
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  
                  <div class="form-group">
                      <label class="text-muted small">NAMA LENGKAP</label>
                      <input type="text" class="form-control" name="customer_name" required>
                  </div>

                  <div class="form-group">
                      <label class="text-muted small">ALAMAT PENGIRIMAN</label>
                      <textarea class="form-control" name="customer_address" rows="3" required></textarea>
                  </div>

                  <div class="form-group mt-4">
                      <label class="text-muted small mb-2">METODE PENGIRIMAN</label>
                      <div class="d-flex gap-3">
                          <div class="custom-control custom-radio mr-4">
                              <input type="radio" id="delivery" name="delivery_option" value="delivery" class="custom-control-input" checked>
                              <label class="custom-control-label" for="delivery">Delivery</label>
                          </div>
                          <div class="custom-control custom-radio">
                              <input type="radio" id="pickup" name="delivery_option" value="pickup" class="custom-control-input">
                              <label class="custom-control-label" for="pickup">Pickup Store</label>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-light border-0" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-4 rounded-pill">Konfirmasi</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/smooth-scroll.js') }}"></script>
    
    @if(session('alert'))
    <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script>
    
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center p-4">
                <div class="mb-3">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                </div>
                <h4 class="mb-2">Berhasil!</h4>
                <p class="text-muted">{{ session('alert') }}</p>
                <button type="button" class="btn btn-primary rounded-pill px-4 mt-3" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
    @endif
</body>
</html>