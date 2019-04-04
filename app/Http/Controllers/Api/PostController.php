<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    public function index()
    {
        // return Post::all();
        $posts = Post::all();
        foreach ($posts as $post) {
            if ($c = preg_match_all("/(public\/images\/)/is", $post->thumbnail, $matches))
                $post->thumbnail = Storage::url($post->thumbnail);
        }
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Post::findOrFail($id);.$post = $this->post->findOrFail($id);
        $post = Post::findOrFail($id);
        if ($c = preg_match_all("/(public\/images\/)/is", $post['thumbnail'], $matches))
            $post['thumbnail'] = Storage::url($post['thumbnail']);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return '';
    }

    public function publish(Post $post)
    {
        $post->published = true;
        $post->save();
        return '';
    }

    public function draft()
    {
        $posts = Post::unpublished()->get();
        foreach ($posts as $post) {
            if ($c = preg_match_all("/(public\/images\/)/is", $post->thumbnail, $matches))
                $post->thumbnail = Storage::url($post->thumbnail);
        }
        return $posts;
    }
}
