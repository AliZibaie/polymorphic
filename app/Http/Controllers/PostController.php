<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = Post::create(['title'=>$request->title, 'content'=>$request->content]);
        $fullName = pathinfo($request->file('image')->getClientOriginalName())['filename'];
        $extension = $request->file('image')->getClientOriginalExtension();
//        dd($fullName,$extension);
        $newName = time().$fullName.'.'.$extension;
        $url = $request->file('image')->storeAs('public/images/posts', $newName);
//        dd($url);
        $post->image()->create(['url'=>$url]);
    }

    public function index()
    {

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
