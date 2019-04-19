<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Gate;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function index()
    // {
    //     $posts = Post::published()->paginate();
    //     return view('home', compact('posts'));
    // }

    // public function create()
    // {
    //     return view('posts.create');
    // }

    // public function store(StorePostRequest $request)
    // {
    //     $data = $request->only('title', 'body');
    //     $data['slug'] = str_slug($data['title']);
    //     $data['user_id'] = Auth::user()->id;
    //     $post = Post::create($data);
    //     return redirect()->route('edit_post', ['id' => $post->id]);
    // }

    // public function edit(Post $post)
    // {
    //     return view('posts.edit', compact('post'));
    // }

    // public function update(Post $post, UpdatePostRequest $request)
    // {
    //     $data = $request->only('title', 'body');
    //     $data['slug'] = str_slug($data['title']);
    //     $post->fill($data)->save();
    //     return back();
    // }

    // public function show($id)
    // {
    //     $post = Post::published()->findOrFail($id);
    //     return view('posts.show', compact('post'));
    // }

    // public function publish(Post $post)
    // {
    //     $post->published = true;
    //     $post->save();
    //     return back();
    // }

    // public function drafts()
    // {
    //     $postsQuery = Post::unpublished();
    //     if (Gate::denies('post.draft')) {
    //         $postsQuery = $postsQuery->where('user_id', Auth::user()->id);
    //     }
    //     $posts = $postsQuery->paginate();
    //     return view('posts.drafts', compact('posts'));
    // }
}
