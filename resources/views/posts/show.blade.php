@extends('layouts.app')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center mt-5">
        <div class="col-5">
            <img src="/storage/{{$post->image}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" alt="" class="rounded-circle" style="width: 40px; height: 40px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{$post->user->username}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                    </span>
                    <span>{{$post->caption}}</span>
                </p>
            </div>
        </div>
    </div>

</div>
@endsection