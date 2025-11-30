@extends('layouts.main')
@section('title', 'Users')
@section('content')
<div class="container-fluid">
  <h3 class="mb-4 text-light">Users</h3>
  <a href="/users/addform" class="btn btn-primary"><i class="bi bi-plus-square"></i></a>

  @if (session('alert'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session('alert') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <table id="example" class="table table-dark table-striped table-hover w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $idx => $u)
      <tr>
        <td>{{ $idx + 1 }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>
          @if ($u->photo)
            <img src="{{ asset('storage/photo/' . $u->photo) }}"
                 alt="{{ $u->name }}"
                 class="img-thumbnail bg-transparent border-0 p-0"
                 style="max-width:90px;">
          @else
            <img src="{{ asset('storage/photo/no-image.jpg') }}"
                 alt="No Image"
                 class="img-thumbnail bg-transparent border-0 p-0"
                 style="max-width:90px;">
          @endif
        </td>
        <td>
          <a href="/users/delete/{{ $u->id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
          <!-- jika mau tambah edit: -->
          <!-- <a href="/users/edit/{{ $u->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> -->
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
