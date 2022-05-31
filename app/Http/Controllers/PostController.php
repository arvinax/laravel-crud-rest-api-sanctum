<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::query()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(Request $request){
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->slug = $request->input('title');
        $post->save();

        return redirect('/posts')->with('success', 'post created');
    }

    public function show($id){
        $post = Post::find($id);
        return view('inc.single')->with('post', $post);
    }

    public function edit($id){
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'   => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->slug = $request->input('title');
        $post->save();

        return redirect('/posts')->with('success', 'post updated');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('falied', 'Post removed');
    }
}
