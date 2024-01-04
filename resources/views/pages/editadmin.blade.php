@extends('layouts.main')
@section('container')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/api/admin" class="btn btn-primary mb-2">Back</a>

<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-header">
            <h3 class="card-title mt-2">Edit Admin</h3>
        </div>
        <form action="/api/admin/{{ $user->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group mt-3">
                <label for="nama_barang">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password" value="{{ old('password') }}">
            </div>
            <div class="form-group mt-3">
                <label for="user_type">User Type</label>
                <select class="custom-select form-control" name="user_type" id="user_type" {{ $user->user_type == 'owner' ? 'disabled' : '' }}>
                    @if ($user->user_type == 'owner')
                    <option value="owner" {{ $user->user_type == 'owner' ? 'selected' : '' }}>Owner</option>
                    @else
                    <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="karyawan" {{ $user->user_type == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                    @endif
                </select>
            </div>           
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>

@endsection