@extends('Layouts.app')
@section('content')
    <div class="col p-1">
        <a href="{{route('dashboard')}}" class="btn btn-primary bg-primary box-shadow">dashboard</a>
        <a href="{{route('tag.create')}}" class="btn btn-primary bg-primary box-shadow">New Tag</a>
    </div>
    <hr class="alert-warning">
    <div class="row">
        <div class="col p-4">
            @foreach($tags as $tag)

                <div class="col p-1"><strong class="btn btn-primary bg-info box-shadow">{{{$tag->name}}}</strong></div>
                <div class="col p-1">
                    <a href="{{route('tag.edit',['tag'=>$tag->id])}}" class="btn btn-warning bg-warning box-shadow">
                        Edit Tag</a>
                    <form method="POST" action="{{route('tag.destroy',['tag'=>$tag->id])}}">
                        <button onclick="return confirm('Are you sure?');" class="btn btn-danger bg-danger box-shadow"
                                type="submit">
                            <span class="" aria-hidden="true">Delete Tag</span></button>
                        @method('DELETE')
                        {{ csrf_field() }}
                    </form>
                </div>
                <hr class="alert-success">
            @endforeach
        </div>
    </div>
@endsection
