@extends('layouts.main')
@section('title', 'Users') 
@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/users/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Photo</label>
                    <input type="file" name="photo" id="photo" accept="image/" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection