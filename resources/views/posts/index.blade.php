@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @foreach ($post as $post)
    <div class="post">
        <div class="col-8 offset-4">
            <img src="{{asset('storage/'.$post->images)}}" alt="" class="w-50">
        </div>
        <div class="col-4 offset-4 mt-2">
            <div class="d-flex align-items-center">
                <div class="pr-2">
                    <img src="{{asset('storage/'.$post->user->profile->profileImage())}}" class="rounded-circle w-100" style="max-width: 30px">
                </div>
                <div>
                    <a href="{{url('/profile/'.$post->user->id)}}" class="text-decoration-none"><span class="text-dark font-weight-bold">{{$post->user->username}}</span></a>
                </div>
            </div>
            <p>{{$post->caption}}</p>
            <hr> 
        </div>
    </div>
    @endforeach
</div>
@endsection
