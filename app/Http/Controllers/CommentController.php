<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);
        if(isset($request->parent_id)) {
            $input['parent_id'] = $request->parent_id;
        }

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);
        return back();
    }
}
