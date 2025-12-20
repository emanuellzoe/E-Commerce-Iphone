@extends('layouts.main')
@section('title', 'Users')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3 class="text-light m-0">Users</h3>
  <a href="/users/addform" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Tambah User</a>
</div>

@if (session('alert'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="background: rgba(40,167,69,0.2); border: 1px solid #28a745; color: #fff;">
  <strong>{{ session('alert') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="table-responsive">
  <table id="example" class="table outline w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>User Info</th>
        <th>Email</th>
        <th>Foto</th>
        <th class="text-right">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $idx => $u)
      <tr>
        <td class="text-center text-muted">{{ $idx + 1 }}</td>
        <td>
            <div class="font-weight-bold text-white">{{ $u->name }}</div>
            <div class="small text-muted">Joined: {{ $u->created_at ? $u->created_at->format('d M Y') : '-' }}</div>
        </td>
        <td class="text-white-50">{{ $u->email }}</td>
        <td>
          @if ($u->photo)
            <img src="{{ asset('storage/photo/' . $u->photo) }}"
                 alt="{{ $u->name }}"
                 style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #333;">
          @else
            <div style="width: 40px; height: 40px; border-radius: 50%; background: #333; display: flex; align-items: center; justify-content: center; color: #888;">
                <i class="bi bi-person-fill"></i>
            </div>
          @endif
        </td>
        <td class="text-right">
          <button class="btn btn-outline-danger btn-sm rounded-circle d-inline-flex align-items-center justify-content-center" title="Delete User" data-toggle="modal" data-target="#deleteModal" data-url="/users/delete/{{ $u->id }}" style="width: 40px; height: 40px; padding: 0;">
              <i class="bi bi-trash"></i>
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection