@extends('layout.main')


@section('container')
<div class="container ">
    <div class="row my-3">
        <div class="col-md-7">
            <h2 class=""><i class="bi bi-box-seam"></i> {{ isset($question) ? 'Edit' : 'Create' }} Question </h2>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2 ">
            <a href="/question/create" class="btn btn-sm btn-secondary " style="border-radius: 5px;"> <span data-feather="arrow-left" class="me-2"></span>Back</a>
        </div>
    </div>

    <form action="{{ isset($question) ? url('/post') . '/' . $question->slug  : url('/post') }}" method="post">
        @csrf
        @isset($question)
        @method('put')
        @endisset
        <div class="mb-3">
            <label for="title" class="form-label">Title Question</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $question->title ?? old('title')}}" placeholder="Title Question...">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" name="category_id" required>
                <option value="">Pilih Category</option>
                @foreach($data_kategori as $kategori)
                @if( ($question->category_id ?? old('category_id')) == $kategori->id)
                <option value="{{$kategori->id}}" selected>{{$kategori->name }}</option>
                @else
                <option value="{{$kategori->id}}">{{$kategori->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">Detail Question</label>
            <input id="detail" type="hidden" name="detail" value="{!! $question->detail ?? old('detail') !!}">
            <trix-editor input="detail"></trix-editor>
            @error('detail')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });
</script>
@endsection