<!doctype html>
<html lang="en">
  <head>
    <title>Login - E-Commerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        body {
            background: #121212;
            color: #e6e6e6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        .card-header {
            background-color: #252525;
            border-bottom: 1px solid #333;
            color: #fff;
            text-align: center;
            font-weight: bold;
        }
        .form-control {
            background-color: #2b2b2b;
            border: 1px solid #444;
            color: #fff;
        }
        .form-control:focus {
            background-color: #333;
            border-color: #007bff;
            color: #fff;
            box-shadow: none;
        }
        .form-control::placeholder {
            color: #888;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        USER LOGIN
                    </div>
                    <div class="card-body">
                        <form action="/ceklogin" method="post">
                            @csrf
                            <div class="form-group pt-3">
                                <label for="email" class="text-white-50 small">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan E-mail" required autofocus>
                            </div>
                            <div class="form-group pt-3">
                                <label for="password" class="text-white-50 small">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                            </div>
                            <div class="form-group pt-4 mb-0">
                                <button class="btn btn-primary btn-block font-weight-bold">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-transparent border-secondary text-center">
                        <a href="{{ url('/') }}" class="small text-muted">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>