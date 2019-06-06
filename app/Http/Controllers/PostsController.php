<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() 
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    public function show(Post $post) 
    {
        return $post;
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create($request->only(['title', 'body']));

        return redirect()->to($post->path());
    }

    public function createForm() 
    {
        return view('posts.create');
    }
}
