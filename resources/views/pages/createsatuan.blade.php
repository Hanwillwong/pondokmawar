@extends('layouts.main')
@section('container')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 20px; padding: 0; background: none; border: none;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-header">
            <h3 class="card-title mt-2">Tambah Satuan</h3>
        </div>
        <form action="/api/satuan" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Satuan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Satuan" value="{{ old('nama') }}">
            </div>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection