<!doctype html>
<html lang="en">

<head>
    <title>iPhone Store - Premium</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-body: #000000;
            --bg-card: #1c1c1e;
            --accent: #2997ff;
            --text-main: #f5f5f7;
            --text-muted: #86868b;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero {
            padding: 80px 20px 40px;
            text-align: center;
            background: radial-gradient(circle at center, #2c2c2e 0%, #000000 70%);
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            background: -webkit-linear-gradient(#fff, #888);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .hero p {
            color: var(--text-muted);
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto 40px;
        }

        /* Search Bar */
        .search-container {
            max-width: 500px;
            margin: 0 auto;
            position: relative;
        }
        
        .form-control-lg {
            background-color: rgba(44, 44, 46, 0.8);
            border: 1px solid #38383a;
            color: #fff;
            border-radius: 99px;
            padding-left: 50px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .form-control-lg:focus {
            background-color: rgba(60, 60, 62, 0.9);
            border-color: var(--accent);
            box-shadow: 0 0 20px rgba(41, 151, 255, 0.2);
            color: #fff;
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        /* Navbar */
        .navbar-custom {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-login {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 20px;
            padding: 8px 20px;
            font-size: 0.9rem;
            transition: 0.3s;
        }
        .btn-login:hover {
            background: #fff;
            color: #000;
            text-decoration: none;
        }

        /* Product Grid */
        .product-section {
            padding: 60px 20px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 40px;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar-custom">
        <a href="/" class="text-white font-weight-bold h5 mb-0"> iPhoneStore</a>
        <a href="{{ url('/login') }}" class="btn-login">Login</a>
    </nav>

    <div class="hero">
        <h1>iPhone</h1>
        <p>Lebih dari sekadar smartphone. Temukan iPhone impianmu hari ini.</p>
        
        <div class="search-container">
            <i class="bi bi-search search-icon"></i>
            <input type="text" id="search" class="form-control form-control-lg" placeholder="Cari iPhone, iPad, Mac...">
        </div>
    </div>

    <div class="container product-section">
        <h2 class="section-title">Terbaru.</h2>
        
        <div class="row" id="product-grid">
            @include('partials.product_list', ['products' => $products])
        </div>
    </div>

    <footer class="text-center py-5 text-muted small">
        &copy; {{ date('Y') }} iPhoneStore Inc. All rights reserved.
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var timeout = null;
            $('#search').on('keyup', function() {
                var query = $(this).val();
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    $.ajax({
                        url: "{{ route('search.live') }}",
                        type: "GET",
                        data: {'search': query},
                        success: function(data) {
                            $('#product-grid').html(data);
                        },
                        error: function(xhr) { console.error(xhr); }
                    });
                }, 100);
            });
        });
    </script>
</body>
</html>
