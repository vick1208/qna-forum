@extends('layout.main')

@section('css')
<style>
    .card {
        /* border-radius: 20px; */
        box-shadow: 0 0 20px #888888;
    }
</style>
@endsection

@section('container')
<div class="container-postingan">
    @foreach($data_question as $postingan)
    @include('post.postingan')
    @endforeach
</div>

@endsection