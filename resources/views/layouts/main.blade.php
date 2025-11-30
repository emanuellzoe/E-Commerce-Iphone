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

  <style>
    /* halaman penuh dan warna dasar */
    html, body { height:100%; margin:0; background:#0b0b0b; color:#e6e6e6; }
    body { display:flex; flex-direction:column; min-height:100vh; }

    /* header user atas (tipis) */
    .topbar {
      background: #151515;
      border-bottom: 1px solid #222;
      height:56px;
      display:flex;
      align-items:center;
      padding:0 .75rem;
    }

    /* layout konten utama: sidebar kiri + main content */
    .app-wrapper { display:flex; flex:1; min-height:0; } /* min-height:0 agar anak flex scrollable */

    /* SIDEBAR: warna diubah ke #121212 sesuai permintaan */
    .sidebar {
      width: 240px;
      background: #121212;         /* ganti warna navigasi side */
      border-right: 1px solid #222;
      padding-top: 1.25rem;
      flex-shrink: 0;
      overflow: auto;
      height: calc(100vh - 56px); /* agar sidebar berhenti sebelum footer */
    }
    .sidebar .nav-link {
      color: #cfcfcf;
    }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background:#222;
      color:#fff;
    }

    /* MAIN CONTENT: padding lebih kecil supaya konten lebih dekat ke header/side */
    .main-content {
      flex:1;
      padding: 0.75rem ; /* kurangin jarak atas dan sisi */
      overflow:auto;
      background: #121212;
    }

    /* content-card tanpa padding (kamu minta hapus p-3) dan background #121212 */
    .content-card {
       
      box-shadow: none !important;/* pastikan shadow dimatikan */
      color:#e6e6e6;
      /* jangan beri padding di sini — element child (halaman) akan mengatur spacing sendiri */
    }

    /* footer menempel di bawah */
    footer {
      background: #151515;
      color: #d0d0d0;
      text-align: center;
      padding: .75rem;
      border-top: 1px solid #222;
      position: relative;
    }

    /* =========================
       Table: outline style + zebra rows (sesuaikan palet)
       ========================= */
    .table.outline {
      width: 100%;
      border-collapse: collapse;
      background: transparent;
      margin-bottom: 0;
      border: 1px solid #222;
    }
    .table.outline th,
    .table.outline td {
      border: 1px solid #272727;
      padding: 12px 10px;
      vertical-align: middle;
      color: #e6e6e6;
    }
    .table.outline thead th {
      background: #121212; /* gunakan warna navigasi side/header yang sama */
      color: #f0f0f0;
      font-weight: 600;
      border-bottom-width: 2px;
    }
    .table.outline tbody tr:nth-child(odd) {
      background: #111111; /* ganjil: gelap */
    }
    .table.outline tbody tr:nth-child(even) {
      background: #161616; /* genap: sedikit lebih terang */
    }
    .table.outline tbody tr:hover {
      background: #1f1f1f;
    }
    .table.outline td img {
      max-width: 90px;
      height: auto;
      display: block;
      margin-left: auto;
      margin-right: auto;
      border-radius: 4px;
      border: 1px solid #222;
      background: #0b0b0b;
    }

    @media (max-width: 767px) {
      .sidebar { position:fixed; left:-260px; top:56px; height:calc(100% - 56px); z-index:1030; transition:left .25s; }
      .sidebar.show { left:0; }
      .main-content { padding-top:1rem; }
    }

    /* small visual tweaks for datatable header */
    table.dataTable thead th { border-bottom: 0; }
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
        <a class="navbar-brand text-light ml-2 d-none d-md-inline" href="{{ url('/') }}">iPhoneStore</a>
      </div>

      <div class="d-flex align-items-center">
        <a class="text-light mr-3" href="#"><i class="bi bi-cart3"></i> <span class="badge badge-light text-dark">0</span></a>
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
        <hr class="border-secondary my-2">
        <a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a>
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

  <script>
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
