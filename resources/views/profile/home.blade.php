@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="width: 170px; height: 170px;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center pb-2">
                    <div class="h4">{{$user->username}}</div>
                    <follow-button user_id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>

                @can('update',$user->profile)
                <a href="/p/create">Add a post</a>
                @endcan
            </div>
            <!-- <div class="d-flex justify-content-end"> -->
            @can('update',$user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
            @endcan
            <!-- </div> -->
            <div class="d-flex">
                <div class="pr-5"><strong>{{$postCount}}</strong> Posts</div>
                <div class="pr-5"><strong>{{$followersCount}}</strong> Followers</div>
                <div class="pr-5"><strong>{{$followingCount}}</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div> <a class="text-decoration-none font-weight-bold text-dark" href="#">{{$user->profile->url}}</a> </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 mb-5">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" alt="" class="w-100 h-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection