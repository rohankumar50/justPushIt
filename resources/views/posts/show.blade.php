@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <img src="{{asset('storage/'.$post->images)}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-2">
                    <img src="{{asset('storage/'.$post->user->profile->profileImage())}}" class="rounded-circle w-100" style="max-width: 30px">
                </div>
                <div>
                    <a href="{{url('/profile/'.$post->user->id)}}" class="text-decoration-none"><span class="text-dark font-weight-bold">{{$post->user->username}} |</span></a>
                </div>
                <div>
                    <a href="#" class="pl-2 font-weight-bold">Follow</a>
                </div>
            </div>
            <hr>
            <p>{{$post->caption}}</p>
        </div>
    </div>
</div>
@endsection
