<!doctype html>
<html lang="en">

<head>
    <title>Search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <!-- Bootstrap Icons (bi bi-search) -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #121212;
            color: #e6e6e6;
        }

        .search-wrapper {
            margin-top: 2rem;
        }

        .search-title {
            color: #f5f5f5;
        }

        .search-subtitle {
            color: #a0a0a0;
        }

        .form-control.bg-dark {
            background-color: #1b1b1b !important;
            color: #e6e6e6 !important;
        }
        
        .form-control.bg-dark:focus {
            background-color: #2b2b2b !important;
            color: #ffffff !important;
            border-color: #17a2b8;
        }
    </style>
</head>

<body>
    <div class="container search-wrapper">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="mb-1 search-title">Search</h3>
                <small class="search-subtitle">Cari produk menggunakan kolom di bawah.</small>
                <hr class="border-secondary">
            </div>
        </div>

        <div class="row justify-content-start">
            <div class="col-md-6 col-lg-5">
                <form action="{{ url('actsearch') }}" method="GET" onsubmit="return false;">
                    @csrf
                    <div class="input-group">
                        <input
                            type="text"
                            name="search"
                            class="form-control bg-dark border-secondary"
                            id="search"
                            placeholder="Search product..."
                            autocomplete="off"
                            value="{{ request('search') }}"
                        >

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-7 text-right">
                <a href="{{ url('/login') }}" class="btn btn-outline-light">Login</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h4 class="mb-3 text-light">Latest Products</h4>
            </div>
        </div>
        
        <!-- Product Grid Container -->
        <div class="row" id="product-grid">
            @include('partials.product_list', ['products' => $products])
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
            
    <script>
        $(document).ready(function() {
            var timeout = null;

            $('#search').on('keyup', function() {
                var query = $(this).val();

                // Clear previous timeout to debounce the request (optional but good for performance)
                clearTimeout(timeout);

                // Set a small delay (e.g., 300ms) to wait for user to stop typing
                timeout = setTimeout(function() {
                    $.ajax({
                        url: "{{ route('search.live') }}",
                        type: "GET",
                        data: {'search': query},
                        success: function(data) {
                            $('#product-grid').html(data);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error);
                        }
                    });
                }, 100); 
                // Note: user asked for "seketika" (instantly), so 100ms or 0ms is fast. 
                // 300ms is standard for debounce but 100ms feels snappier.
            });
        });
    </script>
</body>

</html>