<!doctype html>
<html lang="en">

<head>
    <title>Apple Store - Premium</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%23ffffff%22><path d=%22M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z%22/></svg>">

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
            padding: 100px 20px 40px;
            text-align: center;
            background: radial-gradient(circle at center, #2c2c2e 0%, #000000 70%);
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0; /* Hidden initially for animation */
            transform: translateY(20px);
            animation: heroFadeIn 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 0.2s;
        }

        .hero h1 {
            font-size: 4rem;
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
            opacity: 0;
            animation: fadeIn 1s ease forwards;
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
            opacity: 0; /* Hidden initially */
            transform: translateY(30px);
            animation: gridFadeIn 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 1.2s; /* Delayed to appear after hero */
        }

        .section-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 40px;
            text-align: center;
        }

        /* Animations */
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        @keyframes heroFadeIn {
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes gridFadeIn {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <nav class="navbar-custom">
        <a href="/" class="text-white font-weight-bold h5 mb-0 d-flex align-items-center">
            <svg class="bi bi-apple mr-2" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
            </svg>
            Apple Store
        </a>
        <a href="{{ url('/login') }}" class="btn-login">Login</a>
    </nav>

    <div class="hero">
        <div class="d-flex justify-content-center mb-3">
             <svg class="bi bi-apple" width="80" height="80" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
            </svg>
        </div>
        <h1>Apple Store</h1>
        <p>Temukan perangkat Apple favoritmu. Mulai dari sini.</p>
        
        <div class="search-container">
            <i class="bi bi-search search-icon"></i>
            <input type="text" id="search" class="form-control form-control-lg" placeholder="Cari iPhone, Mac, iPad..." autocomplete="off">
        </div>
    </div>

    <div class="container product-section">
        <h2 class="section-title">Koleksi Terbaru.</h2>
        
        <div class="row" id="product-grid">
            @include('partials.product_list', ['products' => $products])
        </div>
    </div>

    <footer class="text-center py-5 text-muted small">
        &copy; {{ date('Y') }} Apple Store Inc. All rights reserved.
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/smooth-scroll.js') }}"></script>
    
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