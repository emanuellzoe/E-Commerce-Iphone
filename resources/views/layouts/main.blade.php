<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
     <style>
    /* halaman penuh dan warna dasar */
    html, body { height:100%; margin:0; background:#0e0e0e; color:#e6e6e6; }
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
    .sidebar {
      width: 240px;
      background: #151515;
      border-right:1px solid #222;
      padding-top: 1.25rem;
      flex-shrink:0;
      overflow:auto;
    }
    .sidebar .nav-link {
      color: #cfcfcf;
    }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background:#222;
      color:#fff;
    }

    .main-content {
      flex:1;
      padding: 1.5rem;
      overflow:auto;
    }

    /* card area untuk konten */
    .content-card {
      background:#1b1b1b;
      border:1px solid #222;
      color:#e6e6e6;
      min-height:70vh; /* kerangka; nanti disesuaikan per halaman */
    }

    /* footer menempel di bawah */
    footer {
      background:#151515;
      color:#d0d0d0;
      text-align:center;
      padding:.75rem;
    }

    /* responsive: sidebar collapsible on small screens */
    @media (max-width: 767px) {
      .sidebar { position:fixed; left:-260px; top:56px; height:calc(100% - 56px); z-index:1030; transition:left .25s; }
      .sidebar.show { left:0; }
      .main-content { padding-top:1rem; }
    }
  </style>
</head>
<body>

  <!-- TOP BAR (user di kanan) -->
  <div class="topbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div>
        <!-- tombol toggle untuk mobile -->
        <button id="sidebarToggle" class="btn btn-sm btn-outline-secondary d-md-none">
          <i class="bi bi-list"></i>
        </button>
        <!-- Nama brand (kecil) -->
        <a class="navbar-brand text-light ml-2 d-none d-md-inline" href="{{ url('/') }}">iPhoneStore</a>
      </div>

      <div class="d-flex align-items-center">
        <a class="text-light mr-3" href="#"><i class="bi bi-cart3"></i> <span class="badge badge-light text-dark">0</span></a>
        <div class="dropdown">
          <a class="text-light dropdown-toggle" id="userMenu" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle" style="font-size:1.25rem"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- APP WRAPPER: SIDEBAR + CONTENT -->
  <div class="app-wrapper">
    <!-- SIDEBAR KIRI -->
    <aside class="sidebar d-none d-md-block">
      <nav class="nav flex-column px-2">
        <a class="nav-link {{ ($key ?? '') == 'home' ? 'active' : '' }}" href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
        <a class="nav-link {{ ($key ?? '') == 'product' ? 'active' : '' }}" href="{{ url('/product') }}"><i class="bi bi-phone"></i> Products</a>
        <a class="nav-link {{ ($key ?? '') == 'add' ? 'active' : '' }}" href="{{ url('/product/addform') }}"><i class="bi bi-plus-square"></i> Add Product</a>
        <hr class="border-secondary my-2">
        <!-- tambahan menu jika perlu -->
        <a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a>
      </nav>
    </aside>

    <!-- SIDEBAR versi mobile (hidden by default) -->
    <aside id="mobileSidebar" class="sidebar d-md-none">
      <nav class="nav flex-column px-2">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
        <a class="nav-link" href="{{ url('/product') }}">Products</a>
        <a class="nav-link" href="{{ url('/product/addform') }}">Add Product</a>
      </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
      <div class="container-fluid">
        <div class="content-card shadow-sm p-3">
          @yield('content')
        </div>
      </div>
    </main>
  </div>

  <!-- FOOTER -->
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
        new DataTable('#example');
    </script>
    
</body>
</html>