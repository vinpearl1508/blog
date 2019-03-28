@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <h2>{{ $post->title }}</h2>
            <p>{{ str_limit($post->body, 100) }}</p>
            <p>
                <a class="btn btn-success" href="{{ route('edit_post', ['id' => $post->id]) }}" role="button">Chỉnh sửa</a>
                @can('post.publish')
                <a class="btn btn-success" href="{{ route('publish_post', ['id' => $post->id]) }}" role="button">Xuất bản</a>
                @endcan
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection 