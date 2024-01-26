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

<div class="d-flex mb-3">
    <input class="form-control me-2" type="search" id="searchInput" placeholder="&#xF002; Search" aria-label="Search" style="font-family: FontAwesome;" name="search" value="">
    <button class="btn btn-outline-success" id="searchButton" type="submit" onclick="search()">Search</button>
</div>

<div class="row mt-3">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100 table-responsive-md">
        <table class="table table-striped text-center mx-auto" id="productTable">
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
                {{-- @foreach ($product as $product)
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
                @endforeach --}}
            </tbody>
        </table>
      </div>
    </div>
</div>

<script>
    // api url
    let api_url = "/api/product";

    // Defining async function
    async function getapi(url) {
        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        show(data.data);
    }
    

    // Calling that async function
    getapi(api_url);

    // Function to define innerHTML for HTML table
    function show(apiData) {
        let tab = "";
        for (let item of apiData) {
            tab += `<tr> 
                <td>${item.nama_barang}</td>
                <td>${item.merk}</td>
                @if (Gate::check('admin') || Gate::check('owner'))
                <td>${item.supplier}</td> 
                @endif
                <td>${item.nama_satuan}</td>		 
                @if (Gate::check('admin') || Gate::check('owner'))
                <td>${item.harga_beli}</td>		 
                @endif
                <td>${item.harga_jual}</td>
                @if (Gate::check('admin') || Gate::check('owner'))
                <td>
                    <a href="/product/${item.id}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <form action="/api/product/${item.id}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus Data?')">
                        <i class="bi bi-trash"></i>
                        </button>
                    </form>
                        @if (Gate::check('owner'))
                        <a href="/riwayatharga/${item.id}" class="btn btn-primary">
                            <i class="bi bi-journal-text"></i>
                        </a>
                        @endif
                </td>		 
                @endif
            </tr>`;
        }
        // Setting innerHTML as tab variable
        document.getElementsByTagName("tbody")[0].innerHTML = tab;
    }

    // Function to handle search
    function search() {
        const searchInput = document.getElementById('searchInput');
        const searchTerm = searchInput.value.trim();
        api_url = `/api/product?search=${searchTerm}`;
        getapi(api_url);
    }
</script>

@endsection