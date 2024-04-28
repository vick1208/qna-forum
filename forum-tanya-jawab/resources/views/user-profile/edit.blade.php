@extends('layout.main')


@section('container')
<div class="container">
    <form action="/profile/{{ $profile->id }}" method="post">
        @csrf
        @method('PUT')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label for="email">Email</label>

            <input type="email" name="email" id="email" class="form-control" value="{{ $profile->user->email }}" disabled>

        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $profile->address }}">

        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $profile->age }}" min="0" max="90">

        </div>
        <div class="form-group">
            <label for="bio">Biodata</label>
            <textarea class="form-control" name="bio" id="bio" rows="4">{{ $profile->bio }}</textarea>

        </div>
        <button type="submit" class="btn btn-secondary">
            Edit
        </button>
    </form>
</div>
@endsection