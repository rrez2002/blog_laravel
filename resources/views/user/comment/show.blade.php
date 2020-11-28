<div class="comments-layer box-shadow">
    <div class="heading">
        <h2>Comments :</h2>
    </div>
    <div class="comments-list-layer ">
        <div class="items">

            @foreach($comments as $comment)
                <div class="comment-item box-shadow ml-3 mr-3" >
                    <div class="heading text-left ">
                        <h5 >{{$comment->author }}</h5>
                        <span>{{$comment->created_at}}</span>
                    </div>
                    <div class="cm-text text-center">
                        <h4>
                            {{$comment->content }}
                        </h4>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
