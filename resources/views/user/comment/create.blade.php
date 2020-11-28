
@auth()
    <div class="col-12 box-shadow ">
        <form action="{{route('comment.store')}}" method="post" class="p-5 bg-white">
            <div class="row form-group ">
                <div class="col-12 form-group">
                    <div class="col-12">
                        <label class="text-black h2" for="content">Comment</label>
                        <textarea name="content" id="content" cols="30" rows="7" class="form-control box-shadow border-secondary"
                                  placeholder="Write your notes..."></textarea>
                    </div>
                </div>
                <div class="col form-group pt-3">
                    <div class="col-12 text-left">
                        <input type="hidden" name="id" value="{{$post->id}}">
                        {{csrf_field()}}
                        <input type="submit" value="Submit Message" class="btn btn-primary py-2 px-4 text-white box-shadow bg-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endauth

