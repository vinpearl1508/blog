<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate(3);
        return view('welcome', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::published()->find($id);
        return view('singlePost', compact('post'));
    }

    public function posts($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        return view('postList', compact('category'));
    }
}