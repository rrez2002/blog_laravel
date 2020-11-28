@extends('Layouts.app')
@section('content')
    @include('Partial.errors')
    <div class="col-md-7 mb-5">
        <form action="{{route('tag.store')}}" class="p-5 bg-white" method="post">
            <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="name">Tag Name</label>
                    <input  id="name" type="text" class="form-control box-shadow" name="name" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    {{csrf_field()}}
                    <input type="submit" value="Submit Your Data" class="btn btn-primary py-2 px-4 text-white box-shadow bg-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
