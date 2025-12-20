<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'iPhoneStore')</title>

  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    /* --- Global Variables & Reset --- */
    :root {
      --bg-body: #000000;
      --bg-card: #1c1c1e;
      --bg-sidebar: #121212;
      --text-main: #f5f5f7;
      --text-muted: #86868b;
      --accent-blue: #2997ff;
      --accent-hover: #0071e3;
      --glass-bg: rgba(28, 28, 30, 0.65);
      --border-color: #38383a;
    }

    body {
      background-color: var(--bg-body);
      color: var(--text-main);
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
    }

    a { text-decoration: none !important; transition: 0.2s ease; }
    
    /* --- Typography --- */
    h1, h2, h3, h4, h5, h6 {
      font-weight: 600;
      letter-spacing: -0.02em;
    }

    /* --- Buttons (Apple Style) --- */
    .btn {
      border-radius: 980px; /* Pill shape */
      font-weight: 500;
      padding: 0.6rem 1.5rem;
      transition: all 0.3s cubic-bezier(0,0,0.5,1);
    }
    .btn-primary {
      background-color: var(--accent-blue);
      border: none;
    }
    .btn-primary:hover {
      background-color: var(--accent-hover);
      transform: scale(1.02);
    }
    .btn-outline-light {
      border: 1px solid var(--border-color);
      color: var(--text-main);
      background: transparent;
    }
    .btn-outline-light:hover {
      background: #fff;
      color: #000;
      border-color: #fff;
    }

    /* --- Sidebar & Layout --- */
    .topbar {
      background: rgba(28, 28, 30, 0.95);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border-color);
      height: 60px;
      display: flex;
      align-items: center;
      padding: 0 1.5rem;
      position: sticky;
      top: 0;
      z-index: 1040;
    }
    /* Reset navbar brand color for dark mode */
    .navbar-brand, .topbar a.text-light {
        color: #f5f5f7 !important;
    }

    .app-wrapper {
      display: flex;
      min-height: calc(100vh - 60px);
    }

    .sidebar {
      width: 260px;
      background: var(--bg-card);
      border-right: 1px solid var(--border-color);
      padding: 2rem 1rem;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
    }
    
    .sidebar .nav-link {
      color: var(--text-muted);
      border-radius: 12px;
      margin-bottom: 8px;
      padding: 12px 16px;
      font-size: 0.95rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: all 0.2s ease;
    }
    
    .sidebar .nav-link i { font-size: 1.1rem; color: inherit; }

    .sidebar .nav-link:hover {
      background: rgba(255, 255, 255, 0.05);
      color: #fff;
    }
    
    .sidebar .nav-link.active {
      background: var(--accent-blue);
      color: #fff;
      box-shadow: 0 4px 12px rgba(41, 151, 255, 0.3);
    }

    .main-content {
      flex: 1;
      padding: 2rem;
      background: var(--bg-body);
      overflow-y: auto;
    }
    
    .card {
      background-color: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      overflow: hidden;
    }

    /* --- Tables (Admin) --- */
    .table.outline {
      border-collapse: separate;
      border-spacing: 0 8px; /* Spacing between rows */
      border: none;
    }
    .table.outline thead th {
      background: transparent;
      border: none;
      color: var(--text-muted);
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .table-dark {
      background-color: transparent;
    }
    .table-dark td, .table-dark th, .table-dark thead th {
      border-color: var(--border-color);
    }
    /* Row styling */
    tbody tr {
      background-color: var(--bg-card) !important;
      transition: transform 0.2s;
    }
    tbody tr:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      z-index: 10;
      position: relative;
    }
    td:first-child { border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
    td:last-child { border-top-right-radius: 12px; border-bottom-right-radius: 12px; }

    /* Form Inputs */
    .form-control {
      background-color: #2c2c2e;
      border: 1px solid transparent;
      border-radius: 12px;
      color: #fff;
      padding: 12px 15px;
    }
    .form-control:focus {
      background-color: #3a3a3c;
      border-color: var(--accent-blue);
      box-shadow: 0 0 0 2px rgba(41, 151, 255, 0.3);
      color: #fff;
    }

    /* --- Custom File Input Styling --- */
    input[type="file"] {
      padding: 10px;
      height: auto; /* Allow height to adjust */
      background-color: #2c2c2e;
      color: #86868b;
    }
    input[type="file"]::-webkit-file-upload-button {
      background-color: #3a3a3c;
      color: #fff;
      border: 1px solid #444;
      border-radius: 8px;
      padding: 6px 12px;
      margin-right: 15px;
      cursor: pointer;
      transition: all 0.2s;
    }
    input[type="file"]::-webkit-file-upload-button:hover {
      background-color: var(--accent-blue);
      border-color: var(--accent-blue);
    }

    /* --- Dropdown Menu (Glass Effect) --- */
    .dropdown-menu {
      background: rgba(28, 28, 30, 0.95);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.5);
      padding: 0.5rem;
      margin-top: 10px;
    }
    
    .dropdown-item {
      color: #fff !important; /* Force white text */
      border-radius: 8px;
      padding: 8px 12px;
      transition: all 0.2s;
    }
    
    .dropdown-item:hover, .dropdown-item:focus {
      background: var(--accent-blue);
      color: #fff !important;
      text-decoration: none;
    }
    
    .dropdown-divider {
      border-top: 1px solid var(--border-color);
      margin: 0.5rem 0;
    }

    /* Media object in dropdown */
    .dropdown-item .media img {
      width: 40px !important; 
      height: 40px !important; 
      min-width: 40px; /* Prevent squashing */
      border-radius: 50%; 
      object-fit: cover;
      border: 1px solid #444;
    }
    .dropdown-item .media h5 {
      font-size: 0.95rem;
      margin-bottom: 0;
      font-weight: 600;
      color: #fff !important; /* Ensure username is white */
    }
  </style>
</head>
<body>

  <!-- TOP BAR -->
  <div class="topbar">
          <div class="container-fluid d-flex justify-content-between align-items-center">
          <div>
            <button id="sidebarToggle" class="btn btn-sm btn-outline-secondary d-md-none">
              <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand text-light ml-2 d-none d-md-inline" href="{{ url('/') }}">Apple Store</a>
          </div>
    
          <div class="d-flex align-items-center">        <!-- Notifikasi Orderan -->
        @php
            $pendingOrders = \App\Order::where('status', 'pending')->count();
        @endphp
        
        <a class="text-light mr-3 position-relative" href="{{ url('/orders') }}" title="Orderan Masuk" style="display: inline-block; padding: 5px;">
            <i class="bi bi-bag" style="font-size:1.4rem;"></i>
            @if($pendingOrders > 0)
                <span class="position-absolute badge badge-danger rounded-circle d-flex justify-content-center align-items-center" 
                      style="top: 0; right: 0; width: 18px; height: 18px; font-size: 0.7rem; border: 2px solid #1c1c1e; padding: 0;">
                    {{ $pendingOrders }}
                </span>
            @endif
        </a>

        <div class="dropdown">
          <a class="text-light dropdown-toggle" id="userMenu" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle" style="font-size:1.25rem"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
            <a class="dropdown-item" type="#">
                            <div class="media">
                                <img src="{{ Auth::user()->photo
                                ? asset('storage/photo/' . Auth::user()->photo) : asset('/storage/photo/no-image.png') }}"
                                    width="50" height="50" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ Auth::user()->name }}</h5>
                                </div>
                            </div>
                        </a>
            <a class="dropdown-item" href="/setting">Setting</a>
            <a class="dropdown-item" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- APP WRAPPER: SIDEBAR + CONTENT -->
  <div class="app-wrapper">
    <aside class="sidebar d-none d-md-block">
      <nav class="nav flex-column px-2">
        <a class="nav-link {{ ($key ?? '') == 'home' ? 'active' : '' }}" href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
        <a class="nav-link {{ ($key ?? '') == 'product' ? 'active' : '' }}" href="{{ url('/product') }}"><i class="bi bi-phone"></i> Products</a>
        <a class="nav-link {{ ($key ?? '') == 'add' ? 'active' : '' }}" href="{{ url('/product/addform') }}"><i class="bi bi-plus-square"></i> Add Product</a>
        <a class="nav-link {{ ($key ?? '') == 'users' ? 'active' : '' }}" href="{{ url('/users') }}"><i class="bi bi-bag"></i> Users</a>
        <a class="nav-link {{ ($key ?? '') == 'orders' ? 'active' : '' }}" href="{{ url('/orders') }}"><i class="bi bi-cart-check"></i> Orderan</a>
        <hr class="border-secondary my-2">
        <a class="nav-link {{ ($key ?? '') == 'user' ? 'active' : '' }}" href="{{ url('/setting') }}"><i class="bi bi-gear"></i> Settings</a>
      </nav>
    </aside>

    <aside id="mobileSidebar" class="sidebar d-md-none">
      <nav class="nav flex-column px-2">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
        <a class="nav-link" href="{{ url('/product') }}">Products</a>
        <a class="nav-link" href="{{ url('/product/addform') }}">Add Product</a>
      </nav>
    </aside>

    <main class="main-content">
      <div class="container-fluid">
        <!-- perhatikan: p-3 dihilangkan seperti permintaan -->
        <div class="content-card">
          @yield('content')
        </div>
      </div>
    </main>
  </div>

  <footer>
    &copy; {{ date('Y') }} iPhoneStore. All rights reserved.
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
          crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
  
  <!-- Custom Smooth Scroll & Animations -->
  <script src="{{ asset('js/smooth-scroll.js') }}"></script>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background: #1c1c1e; border: 1px solid #333; color: #fff; border-radius: 18px;">
        <div class="modal-body text-center p-4">
          <div class="mb-3">
            <i class="bi bi-exclamation-circle text-danger" style="font-size: 3rem;"></i>
          </div>
          <h5 class="mb-2">Konfirmasi Hapus</h5>
          <p class="text-muted mb-4">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
          <div class="d-flex justify-content-center gap-2">
            <button type="button" class="btn btn-secondary rounded-pill px-4 mr-2" data-dismiss="modal">Batal</button>
            <a href="#" id="confirmDeleteBtn" class="btn btn-danger rounded-pill px-4">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Handle Delete Modal
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var url = button.data('url');
      var modal = $(this);
      modal.find('#confirmDeleteBtn').attr('href', url);
    });

    // init datatable (aman jika #example tidak ada)
    try { new DataTable('#example'); } catch(e){}


    // toggle sidebar mobile
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
      document.getElementById('mobileSidebar')?.classList.toggle('show');
    });

    // Price formatting: global script used by pages with #price input
    document.addEventListener("DOMContentLoaded", function () {
      const priceInput = document.getElementById("price");
      if (!priceInput) return;

      const form = priceInput.closest("form");
      // ensure hidden raw field exists
      if (!form.querySelector('input[name="price_raw"]')) {
        const priceRaw = document.createElement("input");
        priceRaw.type = "hidden";
        priceRaw.name = "price_raw";
        form.appendChild(priceRaw);
      }

      function formatRupiah(value) {
        const digits = value.replace(/\D/g, "");
        if (!digits) return "";
        return digits.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      priceInput.addEventListener("input", () => {
        const cursor = priceInput.selectionStart;
        const raw = priceInput.value.replace(/\D/g, "");
        const formatted = formatRupiah(raw);
        priceInput.value = formatted;
        const priceRawEl = form.querySelector('input[name="price_raw"]');
        if (priceRawEl) priceRawEl.value = raw;
        const diff = formatted.length - raw.length;
        priceInput.setSelectionRange(cursor + diff, cursor + diff);
      });

      form?.addEventListener("submit", () => {
        const raw = priceInput.value.replace(/\D/g, "");
        const priceRawEl = form.querySelector('input[name="price_raw"]');
        if (priceRawEl) priceRawEl.value = raw;
        if (!form.querySelector('input[name="price"]')) {
          const hiddenPrice = document.createElement('input');
          hiddenPrice.type = 'hidden';
          hiddenPrice.name = 'price';
          hiddenPrice.value = raw;
          form.appendChild(hiddenPrice);
        } else {
          form.querySelector('input[name="price"]').value = raw;
        }
      });
    });
  </script>
</body>
</html>
