<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate(3);
        return view('welcome', compact('posts'));
    }

}
