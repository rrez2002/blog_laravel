@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card box-shadow border-secondary">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="row m-1">
                        <div class="col-md pt-2  text-left">
                            <a href="{{route('post.index')}}" class="btn btn-primary box-shadow bg-primary">Posts</a>
                            <a href="{{route('tag.index')}}" class="btn btn-primary box-shadow bg-primary">Tags</a>
                            <a href="{{route('comments.index')}}" class="btn btn-primary box-shadow bg-primary">Comments</a>
                        </div>
                        <div class="col-md pt-2 text-right">
                            <a href="{{route('profile.edit')}}" class="btn btn-primary box-shadow bg-primary">Profile</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
