<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Request;

class ForumController extends Controller {

    public function index()
    {
        $posts = Post::latest('published_at')->get();

        return view('home', compact('posts'));
    }

    public function post($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('parent_id', '=', $id)->latest('updated_at')->get();
        $login = false;
        // return view('post')->with('post_id', $post);

        return view('forum.post', compact('post'), compact('comments'))->with('login', $login);
    }

    //Store Forum posts and Comments to db

    public function store()
    {
        $input = Request::all();
        $input['published_at'] = Carbon::now();


        Post::create($input);

        $posts = Post::latest('published_at')->get();

        return view('home', compact('posts'));
    }

    public function storeComment($id)
    {
        $comment = Request::all();
        $comment['parent_id'] = $id;

        Comment::create($comment);

        $post = Post::find($id);
        $comments = Comment::where('parent_id', '=', $id)->get();

        return view('forum.post', compact('post'), compact('comments'));
    }

}