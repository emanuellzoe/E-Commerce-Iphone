<!doctype html>
<html lang="en">
<head>
    <title>Sign In - iPhoneStore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <div class="brand-logo"> Apple Store</div>
        
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

</body>
</html>
