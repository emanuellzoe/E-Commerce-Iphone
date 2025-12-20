@foreach ($products as $p)
<div class="col-md-6 col-lg-4 mb-5">
    <div class="card h-100 border-0 bg-transparent">
        <div class="card-img-wrapper d-flex align-items-center justify-content-center mb-3" 
             style="height: 300px; background: #151516; border-radius: 24px; overflow: hidden; position: relative;">
            
            <a href="{{ url('/product/detail/' . $p->id) }}" class="d-block w-100 h-100 d-flex align-items-center justify-content-center">
                @if ($p->image)
                    <img src="{{ asset('storage/products/' . $p->image) }}" alt="{{ $p->product_name }}" 
                         style="max-height: 80%; max-width: 80%; transition: transform 0.3s ease;">
                @else
                    <img src="{{ asset('storage/products/no-image.jpg') }}" alt="No Image" 
                         style="max-height: 80%; opacity: 0.5;">
                @endif
            </a>
        </div>
        
        <div class="text-center">
            <h5 class="font-weight-bold mb-1">
                <a href="{{ url('/product/detail/' . $p->id) }}" class="text-white text-decoration-none">
                    {{ $p->product_name }}
                </a>
            </h5>
            <p class="text-muted small mb-2">{{ Str::limit($p->description, 50) }}</p>
            <div class="d-flex justify-content-center align-items-center gap-2">
                <span class="text-white mr-3">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                <a href="{{ url('/product/detail/' . $p->id) }}" class="btn btn-primary btn-sm px-3 rounded-pill">Beli</a>
            </div>
        </div>
    </div>
</div>
<style>
    .card-img-wrapper:hover img {
        transform: scale(1.08);
    }
</style>
@endforeach

@if($products->isEmpty())
<div class="col-12 text-center text-muted mt-5">
    <h5>No products found.</h5>
</div>
@endif