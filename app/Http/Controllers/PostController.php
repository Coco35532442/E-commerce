<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all()->sortByDesc('id');
        return view('posts/index', compact('posts'));
    }

    public function new() {
        return view('posts/new');
    }

    public function store(Request $request) {
        request()->validate([
            'title' => 'required',
            'body' =>'required'
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        session()->flash('success', 'Post was successfully created');
        return redirect('/posts');
    }

    public function show($id) {
        // $post = Post::find($id);
        // if($post) {
        //     return view('posts/show', compact('post'));
        // } else {
        //     session()->flash('error', 'No Post Found');
        //     return redirect('/posts');
        // }

        $post = Post::findOrFail($id);
        return view('posts/show', compact('post'));
    }

    public function edit($post) {
        $post = Post::findOrFail($post);
        return view('posts/edit', compact('post'));
    }

    public function update($post) {
        request()->validate([
            'title' => 'required',
            'body' =>'required'
        ]);

        Post::find($post)->update([
            'title' => request('title'),
            'body' => request('body')
        ]);

        session()->flash('success', "Post $post Updated");
        return redirect('/posts');
    }

    public function destroy($post) {
        $post = Post::findOrFail($post);
        $post->delete();
        session()->flash('success', "Post Deleted");
        return redirect('/posts');
    }
}
