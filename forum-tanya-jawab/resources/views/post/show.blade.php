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

@section('js')
<script>
    const modal = document.getElementById('edit-reply-modal')
    modal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const text = button.getAttribute('data-text')
        const id_reply = button.getAttribute('data-id')
        const modalBodyInput = modal.querySelector('.modal-body #message-text')
        document.querySelector('#edit-reply-modal form').setAttribute('action', '/reply/' + id_reply)

        modalBodyInput.value = text
    })
</script>
@endsection