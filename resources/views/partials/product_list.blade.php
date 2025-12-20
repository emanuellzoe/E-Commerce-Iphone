@foreach ($products as $p)
<div class="col-md-6 col-lg-3 mb-4">
    <div class="card bg-dark border-secondary h-100">
        <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #2c2c2c;">
            @if ($p->image)
                <a href="{{ url('/product/detail/' . $p->id) }}" class="d-block w-100 h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('storage/products/' . $p->image) }}" class="card-img-top" alt="{{ $p->product_name }}" style="max-height: 100%; width: auto;">
                </a>
            @else
                <a href="{{ url('/product/detail/' . $p->id) }}" class="d-block w-100 h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('storage/products/no-image.jpg') }}" class="card-img-top" alt="No Image" style="max-height: 100%; width: auto;">
                </a>
            @endif
        </div>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">
                <a href="{{ url('/product/detail/' . $p->id) }}" class="text-light text-decoration-none">
                    {{ $p->product_name }}
                </a>
            </h5>
            <p class="card-text text-white-50 small">{{ Str::limit($p->description, 60) }}</p>
            <div class="mt-auto">
                <h6 class="text-info mb-3">Rp {{ number_format($p->price, 0, ',', '.') }}</h6>
                <button class="btn btn-primary btn-sm btn-block">Buy Now</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@if($products->isEmpty())
<div class="col-12 text-center text-white-50 mt-5">
    <h5>No products found.</h5>
</div>
@endif
