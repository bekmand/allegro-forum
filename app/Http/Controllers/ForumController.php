<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $comments = $this->getComments($id);

        return view('forum.post', compact('post'), compact('comments'));
    }

    //Store Forum posts and Comments to db

    public function store()
    {
        $input = Request::all();
        $input['published_at'] = Carbon::now();
        $input['user_id'] = Auth::User()->id;

        Post::create($input);

        $posts = Post::latest('published_at')->get();

        return view('home', compact('posts'));
    }

    public function storeComment($id)
    {
        $comment = Request::all();
        $comment['parent_id'] = $id;
        $comment['user_id'] = \Auth::User()->id;

        Comment::create($comment);

        $post = Post::find($id);
        $comments = $this->getComments($id);

        return view('forum.post', compact('post'), compact('comments'));
    }

    public function getComments($id)
    {
        return Comment::where('parent_id', '=', $id)
            ->join('users','user_id', '=', 'users.id')->get();
    }

}