<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
    <style>
    /* Layout dasar agar footer di bawah */
    html, body {
      height: 100%;
      margin: 0;
      background-color: #0e0e0e; /* abu tua gelap sebagai background keseluruhan */
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      color: #e0e0e0;
    }

    main {
      flex: 1; /* isi utama mengisi sisa layar */
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      padding-bottom: 20px;
    }

    /* Ubah warna header & footer */
    .navbar, footer {
      background-color: #151515 !important;
    }

    /* Warna link di navbar */
    .navbar-dark .navbar-nav .nav-link {
      color: #cfcfcf;
      transition: color 0.3s ease;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
      color: #ffffff;
    }

    /* Kontainer utama */
    .main-container {
      flex: 1;
      padding: 2rem;
    }

    /* Card styling */
    .card {
      background-color: #1b1b1b;
      border: 1px solid #222;
      color: #e0e0e0;
    }

    .card-body {
      min-height: 75vh; /* supaya konten hampir sampai footer */
    }

    footer {
      color: #d0d0d0;
    }
  </style>

  <title>@yield('title', 'E-commerce iPhone')</title>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <!-- iPhoneStore sebagai tombol Home -->
      <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">iPhoneStore</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="{{ url('/product') }}">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/product/addform') }}">Add Product</a></li>
        </ul>

        <!-- kanan: cart dan user -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-cart3"></i> Cart <span class="badge badge-pill badge-light">0</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userMenu" data-toggle="dropdown" href="#">User</a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main>
    <div class="container-fluid main-container">
      <div class="card shadow-sm">
        <div class="card-body">
          @yield('content')
        </div>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="text-white text-center py-3 mt-auto shadow-sm">
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