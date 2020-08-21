@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{url('p')}}" enctype="multipart/form-data">
        @csrf
        <h1 class="offset-5">Add New Posts</h1>
        
        <div class="form-group row mt-4">
            <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row mt-4">
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
