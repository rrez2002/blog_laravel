<div class="category">
    <p style="font-weight: bold">
        @foreach($post->tags as $tag)
            <a href="#{{$tag->name}}">#{{$tag->name}}</a>
        @endforeach
    </p>
</div>
