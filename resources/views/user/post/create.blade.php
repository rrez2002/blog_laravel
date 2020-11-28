@extends('Layouts.app')
@section('content')
    @include('Partial.errors')
    <div class="col-md-7 mb-5 box-shadow ">
        <form action="{{route('post.store')}}" class="p-5 bg-white" method="post" enctype="multipart/form-data">
            <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0 ">
                    <label for="title">Title</label>
                    <input id="title" type="text" class="form-control box-shadow" name="title" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-12">
                    <label for="content">Content</label>
                    <textarea id="content" rows="10" cols="30" class="form-control box-shadow" name="content" required></textarea>
                </div>
            </div>

            <div class="row form-group ">
                <div class="col-6 ">
                    <label for="image" class="img-fluid">Image</label>
                    <input id="image" type="file" class="form-control " name="image" multiple>
                </div>
                <div class="col-6 mt-6 ">
                    <label for="status">Choose a Status:<br></label>
                    <select name="status" id="status" class="p-2 box-shadow">
                        <option value="published">published</option>
                        <option value="draft">draft</option>
                    </select>
                </div>
            </div>

            <div class="row form-group ">
                @foreach($tags as $tag)
                    <div class="checkbox ">
                        <label>
                            <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}
                        </label>
                        <br>
                    </div>

                @endforeach
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    {{csrf_field()}}
                    <input type="submit" value="Submit Your Data"
                           class="btn btn-primary py-2 px-4 text-white box-shadow bg-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
