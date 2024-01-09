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
            <h3 class="card-title mt-2">Tambah Product</h3>
        </div>
        <form action="/api/product" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control @error ('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}">
            </div>
            <div class="form-group mt-3">
                <label for="merk">Merk</label>
                <input type="text" class="form-control @error ('merk') is-invalid @enderror" id="merk" name="merk" placeholder="Merk" value="{{ old('merk') }}">
            </div>
            <div class="form-group mt-3">
                <label for="supplier">Supplier</label>
                <input type="text" class="form-control @error ('supplier') is-invalid @enderror" name="supplier" id="supplier" placeholder="Supplier" value="{{ old('supplier') }}">
            </div>
            <div class="form-group mt-3">
                <label for="satuan">Satuan</label>
                <select class="custom-select form-control" name="satuan" id="satuan">
                    <option value="pcs">Pcs</option>
                    <option value="koli">Koli</option>
                    <option value="karung">Karung</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" class="form-control @error ('harga_beli') is-invalid @enderror" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="{{ old('harga_beli') }}">
            </div>
            <div class="form-group mt-3">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" class="form-control @error ('harga_jual') is-invalid @enderror" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="{{ old('harga_jual') }}">
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