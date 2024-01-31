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
                    <td>Nama Satuan</td>
                    <td colspan="" class="text">Action</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </div>
</div>

<script>
    // api url
    let api_url = "/api/satuan";

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
                <td>${item.nama}</td>
                <td>
                    <a href="/satuan/${item.id}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <form action="/api/satuan/${item.id}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus Data?')">
                        <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>`;
        }
        // Setting innerHTML as tab variable
        document.getElementsByTagName("tbody")[0].innerHTML = tab;
    }
    // Function to handle search
    function search() {
        const searchInput = document.getElementById('searchInput');
        const searchTerm = searchInput.value.trim();
        api_url = `/api/satuan?search=${searchTerm}`;
        getapi(api_url);
    }
</script>

@endsection