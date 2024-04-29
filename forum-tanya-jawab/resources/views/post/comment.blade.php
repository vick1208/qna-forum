<div class="row">
    <div class="col-1 text-center">
        <img src="/img/{{$replies->user->getImageProfile()}}" alt="" width="55px" class="rounded-circle">
    </div>
    <div class="col-10 text-justify">
        <b> {{$replies->user->name}} </b> {{ $replies->detail }}
        <div style="color: grey;"> {{ $replies->created_at->diffForHumans() }} </div>
    </div>
    <div class="col-1 m-auto">
        @if($replies->user->id == auth()->user()->id)
        <div class="btn-group">
            <a href="javascript:void(0)" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <span style="color:grey"><i data-feather="more-horizontal"></i></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-reply-modal" data-text="{{$replies->detail}}" data-id="{{$replies->id}}">Edit</button>
                </li>
                <li>
                    <form action="/reply/{{$replies->id}}" method="post" class="d-inline ">
                        @method('delete')
                        @csrf
                        <button class="dropdown-item" onclick=" return confirm('Apakah akan menghapus ?')">
                            Hapus
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endif
    </div>
</div>