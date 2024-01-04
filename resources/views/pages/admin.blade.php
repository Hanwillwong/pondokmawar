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
        <table class="table table-striped text-center" id="example">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>User Type</td>
                    <td colspan="" class="text">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->user_type }}</td>
                    <td>
                        <a href="/api/admin/{{ $user->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        @if ($user->user_type !== 'owner')
                        <form action="/api/admin/{{ $user->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"  onclick="return confirm('Yakin akan menghapus Data?')"><i class="bi bi-trash"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>

@endsection