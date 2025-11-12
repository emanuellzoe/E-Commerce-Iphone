@extends('layouts.main')

@section('title', 'Add Product')

@section('content')
<div class="container">
    <h3 class="mb-4 text-light">Edit Produk</h3>
    <form action="{{ url('/product/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group">
        <label for="product_name">Nama Produk</label>
        <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" class="form-control" rows="3">{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Harga</label>
        <!-- input yang terlihat untuk user (format ada titik) -->
        <input type="text" name="price" id="price" class="form-control" value="{{ number_format($product->price, 0, ',', '.') }}" autocomplete="off" inputmode="numeric" />
        <!-- hidden input yang berisi angka murni untuk dikirim ke server -->
        <input type="hidden" name="price_raw" id="price_raw">
    </div>
    <div class="form-group">
        <label for="stock">Stok</label>
        <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
    </div>
    <div class="form-group">
    <label for="image">Gambar Produk</label>
    <input type="file" class="form-control" accept="image/*" name="image" id="image">

    <!-- Container untuk foto lama dan baru -->
    <div class="mt-3 d-flex align-items-start gap-4 flex-wrap">

        <!-- Foto lama -->
        <div>
            @if (!empty($product->image))
                <img src="{{ asset('storage/products/' . $product->image) }}"
                    alt="{{ $product->product_name }}"
                    class="img-thumbnail bg-transparent border-0 p-0"
                    style="max-width:150px;">
            @else
                <img src="{{ asset('storage/products/no-image.jpg') }}"
                    alt="No Image"
                    class="img-thumbnail bg-transparent border-0 p-0"
                    style="width:150px; height:150px; object-fit:cover; border-radius:8px;"
>
            @endif
            <br><small><i>*foto sebelumnya</i></small>
        </div>

        <!-- Preview foto baru -->
        <div id="preview-container" style="display:none;">
            <img id="preview-image"
                src=""
                alt="Foto baru"
                class="img-thumbnail bg-transparent border-0 p-0"
                style="width:150px; height:150px; object-fit:cover; border-radius:8px;">
            <br><small><i>*foto baru</i></small>
        </div>
    </div>
</div>

<!-- Script Preview -->
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-image');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
            previewImage.src = '';
        }
    });
</script>

</div>

<!-- Script Preview -->
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-image');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
            previewImage.src = '';
        }
    });
</script>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
