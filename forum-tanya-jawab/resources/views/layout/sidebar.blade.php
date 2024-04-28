@if($bagian == 'kiri')
<div class="   px-3 py-2 mt-4 ">
    <a href="/"><img src="/img/slack.svg" width="70px" alt="" srcset=""></a>
    <div id="horizontal-navbar">
        <div class="my-4"><a href="/"><i class="bi bi-house-door-fill"></i> Home</a></div>
        <div class="my-4"><a href="/post/create"><i class="bi bi-plus-circle-fill"></i> Create</a></div>
        <div class="my-4"><a href="/profile"><i class="bi bi-gear-fill"></i> Settings</a></div>
    </div>
</div>
<div class="footer">
    @isset(auth()->user()->id)
    <div class=" dropup">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu">
            <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
    @else
    <a href="/login"><i class="bi bi-arrow-right-circle-fill"></i> Login</a>
    @endif
</div>
@elseif($bagian == 'kanan')
<form action="{{url()->current()}}" method="get">
    <input type="text" name="search" id="search-input" placeholder="Search..." value="{{$_REQUEST['search']}}">
</form>

<div style="margin: 20px 0" class="d-flex">
    <h7 class="m-0" style="font-weight: 900;color: #989393;">Category For You</h7>
    <span class="ms-auto">See All</span>
</div>
@foreach($data_kategori as $kategori)
<div class="d-flex mt-2">
    {{ $kategori->name }}
    <span class="ms-auto badge text-bg-secondary"><a href="/?category={{$kategori->name}}" class="text-light">Lihat</a></span>
</div>
@endforeach
<div class="footer">
    <div style="word-spacing: 10px ; margin: 10px 0">
        Lorem ipsum dolor sit amet, consectetur adipisicing eliure fuga.
    </div>
    <div style="color: grey ">
        @Copyright Mei 2024
    </div>
</div>
@endif