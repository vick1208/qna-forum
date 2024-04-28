<div class="row">
    <div class="col-1 text-center">
        <img src="/img/profil.jpg" alt="" width="55px" class="rounded-circle">
    </div>
    <div class="col-11 text-justify">
        <b> {{$replies->user->name}} </b> {{ $replies->detail }}
        <div style="color: grey;"> {{ $replies->created_at->diffForHumans() }} </div>
    </div>
</div>