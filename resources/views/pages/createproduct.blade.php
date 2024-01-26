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
            <h3 class="card-title mt-2">Tambah Barang</h3>
        </div>
        <form action="/api/product" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}">
                @error('nama_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="merk">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk" value="{{ old('merk') }}">
                @error('merk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="supplier">Supplier</label>
                <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Supplier" value="{{ old('supplier') }}">
                @error('supplier')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="satuanid">Satuan</label>
                <select class="custom-select form-control" name="satuanid" id="satuanid">
                    @foreach ($satuan as $satuan)
                        <option value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                    @endforeach
                </select>
                @error('satuanid')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="{{ old('harga_beli') }}">
                @error('harga_beli')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="{{ old('harga_jual') }}">
                @error('harga_beli')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>

@endsection