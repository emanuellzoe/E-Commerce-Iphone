@extends('layouts.main')

@section('title', 'Add User')

@section('content')
<div class="container">
  <h3 class="mb-4 text-light">Tambah User</h3>

  <form action="{{ url('/users/save') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="photo">Photo</label>
      <input type="file" name="photo" id="photo" accept="image/*" class="form-control">
      <small class="text-muted">Kosongkan jika tidak ingin menambahkan foto.</small>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
  </form>
</div>
@endsection
