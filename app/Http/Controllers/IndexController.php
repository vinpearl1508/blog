<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::with('owner')->published()->paginate(3);
        return view('welcome', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::published()->find($id);
        if (empty($post)) return abort(404);
        return view('singlePost', compact('post'));
    }

    public function posts($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        return view('postList', compact('category'));
    }

    public function search()
    {
        $search = \Request::get('key');
        $posts = Post::published()->where('title', 'like', '%' . $search . '%')
            ->orderBy('title')->get();
        return view('search', compact('posts'));
    }
}
