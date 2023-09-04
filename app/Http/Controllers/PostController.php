<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{   
    // indexページへの移動
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts' => $posts]);
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post($request->all());
        $post->save();
        return redirect('/posts');
    }

    public function update(UpdatePostRequest $request,string $id)
    {
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();
        return redirect('/posts');
    }
    // showページへ移動
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts');
    }

}
