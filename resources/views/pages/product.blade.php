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




<form class="d-flex">
    <input class="form-control" type="search" placeholder="&#xF002;  Search" aria-label="Search" style="font-family: FontAwesome;">
    {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
</form>

<div class="row mt-3">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100 table-responsive-md">
        <table class="table table-striped text-center mx-auto" id="example">
            <thead>
                <tr>
                    <td>Nama Barang</td>
                    <td>Merk</td>
                    @if (Gate::check('admin') || Gate::check('owner'))
                    <td>Supplier</td>
                    @endif
                    <td>Satuan</td>
                    @if (Gate::check('admin') || Gate::check('owner'))
                    <td>Harga Beli</td>
                    @endif
                    <td>Harga Jual</td>
                    @if (Gate::check('admin') || Gate::check('owner'))
                    <td colspan="" class="text">Action</td>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
                <tr>
                    <td>{{ $product->nama_barang }}</td>
                    <td>{{ $product->merk }}</td>
                    @if (Gate::check('admin') || Gate::check('owner'))
                    <td>{{ $product->supplier }}</td>
                    @endif
                    <td>{{ $product->satuan }}</td>
                    @if (Gate::check('admin') || Gate::check('owner'))
                    <td>{{ $product->harga_beli }}</td>
                    @endif
                    <td>{{ $product->harga_jual }}</td>
                    {{-- <td>
                        <a href="" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        <a href="" class="btn btn-primary"><i class="bi bi-journal-text"></i></a>
                    </td> --}}
                    @if (Gate::check('admin') || Gate::check('owner'))
                    <td>
                    <a href="/api/product/{{ $product->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <form action="/api/product/{{ $product->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger"  onclick="return confirm('Yakin akan menghapus Data?')"><i class="bi bi-trash"></i></button>
                    </form>
                    <a href="/api/riwayatharga/{{ $product->id }}" class="btn btn-primary"><i class="bi bi-journal-text"></i></a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>

@endsection