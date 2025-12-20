@extends('layouts.main')
@section('title', 'Setting')
@section('content')

<div class="container">
  <h3 class="mb-4 text-light">Ubah Password</h3>

  <form action="/updatepass" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="password_lama">Password Lama</label>
      <input type="password" name="password_lama" id="password_lama" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="password_baru">Password Baru</label>
      <input type="password" name="password_baru" id="password_baru" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="password_konfirmasi">Konfirmasi Password Baru</label>
      <input type="password" name="password_konfirmasi" id="password_konfirmasi" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
  </form>
</div>

@endsection
