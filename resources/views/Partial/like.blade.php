<div class="like">
    <p>
        {{$like->like}} Likes |
        <a href="{{route('like',['id'=>$post->id])}}" class="btn btn-info box-shadow bg-info"> Like </a>
    </p>
</div>
