<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

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
        $this->middleware('can:post.create')->only(['store']);
        // $this->middleware('can:post.update')->only(['update']);
        // $this->middleware('can:post.delete')->only('destroy');
        $this->post = $post;
    }

    public function index()
    {
        $posts = Post::published()->get();
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
        $thumbnail = $request->get('thumbnail');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($thumbnail, 0, strpos($thumbnail, ';')))[1])[1];

        Image::make($request->get('thumbnail'))->save(public_path('images/') . $fileName);
        $post = Post::create([
            'title'           => $request->input('title'),
            'slug'            => $request->input('slug'),
            'description'     => $request->input('description'),
            'thumbnail'       => $fileName,
            'body'            => $request->input('body'),
            'user_id'         => Auth::user()->id,
        ]);
   
        $arTags = $request->tags;
        foreach($arTags as $tag){
            if(!empty($tag['id'])) {
                $post->tags()->attach($tag['id']);
            }else{
                $newTag = new Tag();
                $newTag->name = $tag['name'];
                $newTag->slug = $tag['name'];
                $newTag->save();
                $addedTag = Tag::where('name', $newTag['name'])->first();
                $post->tags()->attach($addedTag->id);
            }
        }
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
        $post = Post::findOrFail($id);
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
        $thumbnail = $request->get('thumbnail');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($thumbnail, 0, strpos($thumbnail, ';')))[1])[1];

        Image::make($request->get('thumbnail'))->save(public_path('images/') . $fileName);
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->description = $request->input('description');
        $post->thumbnail = $fileName;
        $post->body = $request->input('body');
        $post->save();
        return '';
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

    public function publish($id)
    {
        $post = Post::findOrFail($id);
        $post->published = true;
        $post->save();
        return '';
    }

    public function draft()
    {
        $posts = Post::unpublished()->get();
        return $posts;
    }
}
