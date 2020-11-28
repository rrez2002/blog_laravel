@extends('Layouts.app')
@section('content')
    <div class="col-md p-1">
        <a href="{{route('dashboard')}}" class="btn btn-primary bg-primary box-shadow">dashboard</a>
        <a href="{{route('post.create')}}" class="btn btn-primary bg-primary box-shadow">New Post</a>
    </div>
    <hr class="alert-warning">
    <div class="row">
        <div class="col">
            @foreach($posts as $post)
                <div class="col-md p-1"><a href="{{route('post.show',['post'=>$post->id])}}"
                                           class="btn btn-primary bg-info box-shadow ">{{$post->title}}</a></div>
                <div class="col-md p-1">
                    <a href="{{route('post.edit',['post'=>$post->id])}}" class="btn btn-warning bg-warning box-shadow ">
                        Edit Post</a>
                    <form method="POST" action="{{route('post.destroy',['post'=>$post->id])}}">
                        <button onclick="return confirm('Are you sure?');" class="btn btn-danger bg-danger box-shadow"
                                type="submit">
                            <span class="" aria-hidden="true">Delete Post</span></button>
                        @method('DELETE')
                        {{ csrf_field() }}
                    </form>
                </div>
                <hr class="alert-success">
            @endforeach
        </div>
    </div>
@endsection
