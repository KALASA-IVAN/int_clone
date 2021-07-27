@extends('layouts.app')
@section('content')

<div class="container">
    @foreach($posts as $post)

    <div class="row">
        <div class="col-6 offset-3">
            <div class="d-flex align-items-center mb-4">
                <div class="pr-3">
                    <img src="{{$post->user->profile->profileImage()}}" alt="" class="rounded-circle" style="width: 40px; height: 40px;">
                </div>
                <div>
                    <div class="font-weight-bold ">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <a href="/profile/{{$post->user->id}}">
                <img src="/storage/{{$post->image}}" alt="" class="w-100">
            </a>
        </div>
        <div class="col-6 offset-3 pt-2 pb-4">
            <div>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                    </span>
                    <span>{{$post->caption}}</span>
                </p>
                <hr>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <p>{{$posts->links()}}</p>
        </div>
    </div>
</div>
@endsection