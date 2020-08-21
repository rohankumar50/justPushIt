@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{url('profile/'.$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h1 class="offset-5">Edit Profile</h1>

        <div class="form-group row mt-4">
            <div class="col-md-3">
            </div>
            <label for="title" class="col-md-1 col-form-label text-md-left">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-md-3">
            </div>
            <label for="description" class="col-md-1 col-form-label text-md-left">Description</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description}}" required autocomplete="description" autofocus>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-md-3">
            </div>
            <label for="url" class="col-md-1 col-form-label text-md-left">Url</label>

            <div class="col-md-6">
                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" name="url" value="{{ old('url') ?? $user->profile->url}}" required autocomplete="url" autofocus>

                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row mt-4">
            <div class="col-md-3">
            </div>
            <label for="image" class="col-md-1 col-form-label text-md-left">{{ __('Name') }}</label>

            <div class="col-md-6">

                <input type="file" name="image" id="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Add Post
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
