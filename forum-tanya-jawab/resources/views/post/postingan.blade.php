<div class="detail mb-4">
    <div class="row ">
        <div class="col-1 text-center">
            <img src="/img/profil.jpg" alt="" width="55px" class="rounded-circle">
        </div>
        <div class="col-9">
            <h3 class="m-0">{{$postingan->title}}</h3>
            <b>{{$postingan->user->name}}</b> <span style="color: grey; margin-left:15px">{{ date('d F', strtotime($postingan->created_at)) }} pukul {{ date('H.i', strtotime($postingan->created_at)) }}</span>
        </div>
        <div class="col-1 m-auto">
            @if( ($show_comment ?? false) == false )
            <div class="" style="font-size: 20px;"><a href="/post/{{$postingan->slug}}" class="text-dark"><i class="bi bi-arrow-return-right"></i></a></div>
            @elseif($postingan->user_id == auth()->user()->id)
            <a href="/post/{{$postingan->slug}}/edit" class="badge text-white bg-warning p-1"><span data-feather="edit"></span></a>
            <form action="/post/{{$postingan->id}}" method="post" class="d-inline ">
                @method('delete')
                @csrf
                <button class="badge text-white bg-danger border-0 p-1" onclick=" return confirm('Apakah akan menghapus ?')">
                    <span data-feather="trash-2"></span>
                </button>
            </form>
            @endif
        </div>
    </div>
    <div class="row mt-3 text-justify body-content">
        <div class="col-1"></div>
        <div class="col-10">
            {!! $postingan->detail !!}
        </div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        @if( ($show_comment ?? false) )
        <div class="col-10 mt-3">
            <div style="border: 1px solid black; border-radius: 5px; padding: 10px;">
                @foreach($postingan->replies as $replies)
                @include('post.comment')
                @endforeach
            </div>
        </div>
        @else
        <div class="col-10 mt-2" style="font-size: 15px; color:grey">
            0 <i class="bi bi-heart "></i> <span class="mx-2"> {{ $postingan->replies_count }} <i class="bi bi-chat-left "></i></span> 0 <i class="bi bi-share"></i>
        </div>
        @endif
    </div>
</div>