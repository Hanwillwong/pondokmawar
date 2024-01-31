@extends('layouts.main')
@section('container')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/satuan" class="btn btn-primary mb-2">Kembali</a>

<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-header">
            <h3 class="card-title mt-2">Edit Satuan</h3>
        </div>
        <form action="/api/satuan/{{ $satuan->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Satuan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Satuan" value="{{ old('nama', $satuan->nama) }}">
            </div>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>

@endsection