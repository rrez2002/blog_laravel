@extends('layouts.app')

@section('content')
    <div class="site-section bg-light font-nunito">
        <div class="container">
            <div class="row align-items-stretch ">
                @foreach($posts as $post)
                    <div class="col-md-4 p-1 text-center mb-5 box-shadow ">
                        <h2>{{$post->title}}</h2>
                        <span class="date"> create at {{$post->updated_at}}</span>
                        <div class="bg-img"
                             style="background-image: url('{{URL::to('images').'/'.$post->image}}');"></div>
                        <br>
                        <a href="{{route('post.show',['post'=>$post->id])}}" class=" btn btn-primary box-shadow bg-primary">Read More</a>
                    </div>
                @endforeach
            </div>
            <div class="row ">
                <div class="col-md position-fixed " style="left: 43% !important">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection

