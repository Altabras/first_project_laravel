<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    public function index() {
           $posts = Post::all();

            return view('post.index', compact('posts'));


    }


    public function create() {
        return view('post.create');
    }


    public function store() {
        $data = request()->validate([
           'title'=> 'string',
           'content'=> 'string',
           'image'=> 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }


    public function show(Post $post){

        return view('post.show', compact('post'));
    }


    public function edit(Post $post){

        return view('post.edit', compact('post'));
    }

    public function update(Post $post){

        $data = request()->validate([
            'title'=> 'string',
            'content'=> 'string',
            'image'=> 'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }



    public function delete(){
        $post = Post::withTrashed()->find(1);
        $post->restore();
        dd('delete');
    }


    public function destroy(Post $post){

        $post->delete();
        return redirect() ->route('post.index');
    }


    public function firstOrCreate(){


       $post = Post::firstOrCreate([
            'title'=> 'some test PHP title22'
        ],[
            'title'=> 'some test PHP title22',
            'content'=> 'some test PHP content22',
            'image'=> 'some test PHP image22',
            'likes'=> 52100,
            'is_published'=>1
        ]);
       dump($post->content);
    }


    public function updateOrCreate(){

        $post = Post::updateOrCreate([
            'title'=> 'update PHP title22'
        ],[
            'title'=> 'update PHP title22',
            'content'=> 'update test PHP ',
            'image'=> 'some test PHP image22',
            'likes'=> 2100,
            'is_published'=>0
        ]);

        dump($post->content);

    }
}
