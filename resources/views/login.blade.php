<!doctype html>
<html lang="en">
<head>
    <title>Sign In - iPhoneStore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22 fill=%22%23ffffff%22><path d=%22M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z%22/></svg>">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background: #000000;
            color: #f5f5f7;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        /* Ambient background glow */
        body::before {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(41, 151, 255, 0.15) 0%, rgba(0,0,0,0) 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .login-card {
            background: rgba(28, 28, 30, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .brand-logo {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            color: #fff;
        }

        .form-control {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid #38383a;
            color: #fff;
            border-radius: 12px;
            padding: 12px 16px;
            height: auto;
            font-size: 1rem;
            transition: 0.3s;
        }

        .form-control:focus {
            background: rgba(0, 0, 0, 0.5);
            border-color: #2997ff;
            box-shadow: 0 0 0 2px rgba(41, 151, 255, 0.25);
            color: #fff;
        }

        .btn-primary {
            background: #2997ff;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 500;
            font-size: 1rem;
            width: 100%;
            margin-top: 20px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #0071e3;
            transform: scale(1.02);
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
            display: block;
            color: #86868b;
            font-size: 0.9rem;
            text-decoration: none;
        }
        .back-link:hover { color: #fff; text-decoration: none; }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo d-flex justify-content-center align-items-center">
            <svg class="bi bi-apple mr-2" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
            </svg>
            Apple Store
        </div>
        
        <form action="/ceklogin" method="post">
            @csrf
            <div class="form-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-primary">Sign In</button>
        </form>

        <a href="{{ url('/') }}" class="back-link">Kembali ke Beranda</a>
    </div>

    <script src="{{ asset('js/smooth-scroll.js') }}"></script>
</body>
</html>
