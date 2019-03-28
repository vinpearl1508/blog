<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <h2>{{ $post->title }}</h2>
            <img class="img-fluid" src="{{ Storage::url($post->thumbnail) }}" alt="">
            <p>{{ str_limit($post->body, 100) }}</p>
            <p><a class="btn btn-default" role="button">Chi tiết &raquo;</a></p>
        </div>
        @endforeach
    </div>
</div>