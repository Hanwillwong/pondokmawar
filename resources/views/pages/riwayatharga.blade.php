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

<a href="/product" class="btn btn-primary mb-2">Back</a>

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
                    <td>Tanggal & Waktu</td>
                    <td>Harga Beli</td>
                    <td>Harga Jual</td>
                    <td colspan="" class="text">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayatHarga  as $riwayat)
                <tr>
                    <td>{{ $riwayat->created_at }}</td>
                    <td>{{ $riwayat->harga_beli }}</td>
                    <td>{{ $riwayat->harga_jual }}</td>
                    {{-- <td>
                        <a href="" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        <a href="" class="btn btn-primary"><i class="bi bi-journal-text"></i></a>
                    </td> --}}
                    <td>
                    <form action="/api/riwayatharga/{{ $riwayat->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger"  onclick="return confirm('Yakin akan menghapus Data?')"><i class="bi bi-trash"></i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>

@endsection