@extends('Layouts.app')
@section('content')
    <div class="col-md p-1">
        <a href="{{route('dashboard')}}" class="btn btn-primary bg-primary box-shadow">dashboard</a>
        <form method="POST" action="{{route('allDestroy')}}">
            <button onclick="return confirm('Are you sure?');" class="btn btn-danger bg-danger box-shadow"
                    type="submit">
                <span class="" aria-hidden="true">Delete All Comments</span></button>
            @method('DELETE')
            {{ csrf_field() }}
        </form>
    </div>
    <hr class="alert-warning">
    <div class="row">
        <div class="col ml-md-5">
            @foreach($comments as $comment)
                <div class="col-md p-1 box-shadow">
                    <div class="text-left">
                        <p>author : {{$comment->author}}</p>
                        <p>post_id : {{$comment->post_id}}</p>
                        <p >{{$comment->created_at}}</p>
                    </div>
                    <div class="text-center">
                        <p>{{$comment->content}}</p>
                    </div>
                </div>
                <div class="col-md p-1">
                    <form method="POST" action="{{route('comment.destroy',['comment'=>$comment->id])}}">
                        <button onclick="return confirm('Are you sure?');" class="btn btn-danger bg-danger box-shadow"
                                type="submit">
                            <span class="" aria-hidden="true">Delete Comment</span></button>
                        @method('DELETE')
                        {{ csrf_field() }}
                    </form>
                </div>
                <hr class="alert-success">
            @endforeach
        </div>
    </div>
@endsection
