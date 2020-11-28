@extends('Layouts.app')
@section('content')
    <div class="text box-shadow font-nunito">
        <div class="row d-flex ml-3 mr-3  " style="">
            <div class="col-md-12 text-center">
                <h1>{{$post->title}}</h1>
            </div>
            <div class="col-md-12 text-center">
                <img src="{{ Storage::url($post->image) }}" alt="{{$post->title}}" style=";width: 1000px;">
            </div>
            <div class="col-md-12 text-justify mt-4 ">
                <p class="">{{$post->content}}</p>
            </div>
            <div class="col-md-12 text-right">
                <span class="date ">create at {{$post->updated_at}}</span>
            </div>
            <div class="col-md-12 text-left">
                @include('Partial.like')
                @include('Partial.ShowTags')
            </div>
            <div class="col-md-12 text-center">
                @include('user.comment.show')
                @include('user.comment.create')
            </div>


        </div>
    </div>

@endsection
