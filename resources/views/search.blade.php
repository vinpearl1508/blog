@extends('layouts.app')
@section('content')
<div class="blog-post-area">
    <h2 class="title text-center">Result</h2>
    @foreach($posts as $post)
    <div class="single-blog-post">
        <h3>{{ $post->title }}</h3>
        <div class="post-meta">
            <ul>
                <li><i class="fa fa-user"></i> {{ $post->owner->name }}</li>
                <li><i class="fa fa-clock-o"></i> {{ $post->created_at->format('H:i:s') }}</li>
                <li><i class="fa fa-calendar"></i> {{ $post->created_at->format('d.m.Y') }}</li>
            </ul>
            <span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </span>
        </div>
        <a href="#">
            <img src="{{ $post->thumbnail }}" alt="">
        </a>
        <p>{{ $post->description }}</p>
        <a class="btn btn-primary" href="{{ route('singlePost', $post->id) }}">Read More</a>
    </div>
    @endforeach
</div>

@endsection 