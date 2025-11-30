@extends('layouts.main')
@section('title', 'Setting')
@section('content')

<div class="container">
  <h2 class="mb-4 text-light">Ubah Password</h2>

  <div>
    <div class="card-body">

      <form action="/updatepass" method="post" enctype="multipart/form-data" class="mx-auto" style="max-width:720px;">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
          <label for="password_lama" class="text-light">Password Lama</label>
          <input type="password" name="password_lama" id="password_lama"
                 class="form-control bg-white text-dark" required>
        </div>

        <div class="form-group">
          <label for="password_baru" class="text-light">Password Baru</label>
          <input type="password" name="password_baru" id="password_baru"
                 class="form-control bg-white text-dark" required>
        </div>

        <div class="form-group mb-4">
          <label for="password_konfirmasi" class="text-light">Konfirmasi Password Baru</label>
          <input type="password" name="password_konfirmasi" id="password_konfirmasi"
                 class="form-control bg-white text-dark" required>
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection
