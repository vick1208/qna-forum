@extends('layout.main')

@section('container')
    <h1>Pertanyaan Kalian</h1>
    @auth
    <a href="/post/create" class="btn btn-primary">Buat Pertanyaan</a>
    @endauth
@endsection
