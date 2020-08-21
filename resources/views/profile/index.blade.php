@extends('layouts.app')

@section('content')
<div class="container">
    <div class="main mx-5">
        <div class="row mt-5">
            <div class="col-3">
                <img src="{{asset('storage/'.$user->profile->profileImage())}}" class="rounded-circle px-5 py-3 w-100">
            </div>
            <div class="col-9">
                <div class="d-flex justify-content-between  align-items-baseline">
                    <div class="d-flex align-items-center pl-5 pt-3">
                        <div class="h4">{{$user->username}}</div>
                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                        <a href="{{url('p/create')}}">Add Post</a>    
                    @endcan
                </div>
                <div class="d-flex align-items-baseline">
                    <li style="list-style: none" class="pl-5 pt-3">
                    <span style="font-weight: bold">{{$user->posts->count()}} </span>posts
                    </li>
                    <li style="list-style: none" class="pl-5 pt-3">
                        <span style="font-weight: bold">{{$user->profile->followers->count()}} </span>followers
                    </li>
                    <li style="list-style: none" class="pl-5 pt-3">
                        <span style="font-weight: bold">{{$user->following->count()}} </span>following
                    </li>
                    <div class="ml-auto">
                        @can('update', $user->profile)
                            <a href="{{url('/profile/'.$user->id.'/edit')}}">Edit Profile</a>
                        @endcan 
                    </div>
                </div>
                <div>
                    <span style="font-weight: bold" class="pl-5 pt-3">{{$user->profile->title}}</span>
                </div>
                <div>
                    <div class="col-7 pl-5">
                        {{$user->profile->description}}
                    </div>
                    <div class="col-5"></div>
                </div>
                <div>
                    <div><a href="#" class="pl-5">{{$user->profile->url}}</a></div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            @foreach ($user->posts as $post)
            <div class="col-4 my-3">
                <a href="{{url('p/'.$post->id)}}">
                    <img src="{{asset('storage/'.$post->images)}}" class="w-100">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
