@extends('layouts.app')
@section('content')
<div class="blog-post-area">
    <h2 class="title text-center">Latest From our Blog</h2>
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
        <p>{{ $post->description }}</p>
        <p></p>
        <a href="#">
            <img src="{{ $post->thumbnail }}" alt="">
        </a>
        <p></p>
        <p>{!! $post->body !!}</p>
        <div class="pager-area">
            <ul class="pager pull-right">
                <li><a href="#">Pre</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
</div>
@include("layouts.elements.response")
@include("layouts.elements.replay")
@endsection 