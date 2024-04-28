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

    @include('post.postingan', ['postingan' => $this_post, 'show_comment' => true])

</div>

@endsection