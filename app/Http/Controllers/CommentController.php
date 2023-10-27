<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $comment = Comment::create(['content'=>$request->content, 'post_id'=>$post->id, 'comment_id'=>$request->comment_id]);
        $fullName = pathinfo($request->file('image')->getClientOriginalName())['filename'];
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = time().$fullName.'.'.$extension;
        $url = $request->file('image')->storeAs('public/images/comments', $newName);
        $comment->image()->create(['url'=>$url]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post,  Comment $comment)
    {
        dd(asset($comment->image()->first()->url));
        return view('comments.edit', compact('comment', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Comment $comment, Post $post)
    {
        dd($comment, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
