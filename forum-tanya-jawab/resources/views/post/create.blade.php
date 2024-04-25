@extends('layout.main')

@section('container')
<h1>Buat Pertanyaan</h1>
<form action="/post" method="POST">
    @csrf
</form>
@endsection
