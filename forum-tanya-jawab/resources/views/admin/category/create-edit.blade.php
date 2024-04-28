@extends('layout.main')

@section('container')
<div class="container ">
    <div class="row my-3">
        <div class="col-md-7">
            <h2 class=""><i class="bi bi-box-seam"></i> Question Category</h2>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2 ">
            <a href="/category/create" class="btn btn-sm btn-secondary " style="border-radius: 5px;"> <span data-feather="arrow-left" class="me-2"></span>Back</a>
        </div>
    </div>
    
    <form action="{{ isset($category) ? url('/category') . '/' . $category->id  : url('/category') }}" method="post">
        @csrf
        @isset($category)
            @method('put')
        @endisset
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ $category->name ?? old('name')}}" placeholder="Tulis nama kategori...">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

@endsection
