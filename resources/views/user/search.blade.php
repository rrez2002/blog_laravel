@extends('Layouts.app')
@section('content')
        <div class="row font-nunito">
            <div class="col-md-12 text-center">
                <h1 class="quote">Search Engine</h1>
            </div>
        </div>
        <div class="row align-items-stretch ">
            @foreach($posts as $post)
                <div class="col-md-4 p-1 text-center border-bottom mb-3 box-shadow ">
                    <h2>{{$post->title}}</h2>
                    <span class="date">  create at {{$post->updated_at}}</span>
{{--                    <div class="bg-img" style="background-image: url('{{URL::to('images').'/'.$post->image}}');"></div>--}}
                    <br>
                    <a href="{{route('post.show',['post'=>$post->id])}}" class=" btn btn-primary box-shadow bg-primary">Read More</a>
                </div>
            @endforeach
        </div>
@endsection



