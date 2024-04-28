@extends('layout.main')

@section('container')
<div class="container ">
    <div class="row my-3">
        <div class="col-md-7">
            <h2 class=""><i class="bi bi-box-seam"></i> Question Category</h2>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2 ">
            <a href="/category/create" class="btn btn-sm btn-primary " style="border-radius: 5px;"> <span data-feather="plus" class="me-2"></span>Tambah Category</a>
        </div>
    </div>
    @if(session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-striped table-sm align-middle">
            <thead class="thead bg-primary text-white">
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_category as $kategori)
                <tr class="">
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$kategori->name}}</td>
                    <td class="text-center">
                        <a href="/category/{{$kategori->id}}/edit" class="badge text-white bg-warning p-1"><span data-feather="edit"></span></a>
                        <form action="/category/{{$kategori->id}}" method="post" class="d-inline ">
                            @method('delete')
                            @csrf
                            <button class="badge text-white bg-danger border-0 p-1" onclick=" return confirm('Apakah akan menghapus ?')">
                                <span data-feather="trash-2"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
