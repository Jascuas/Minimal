<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getDashboard()
    {
        $posts = Post::all();
        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreatePost(Request $request){
        $this->validate($request, [
            'new_post'=> 'required|max:1000'
        ]);
        $post = new Post();
        $post->new_post = $request['new_post'];
        $message = 'There was an error';
       if ( $request->user()->posts()->save($post))
            $message = 'Post successfully created!';
        return redirect()->route('dashboard')->with(['message'=>$message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Succesfully deleted.']);
    }
    public function postEditPost(Request $request){
        $this->validate($request, [
            'new_post'=> 'required '
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->new_post = $request['new_post'];
        $post->update();
        return \Response::json(['new_body'=>$post->new_post], 200);
    }

    public function postLikePost(Request $request)
    {
        
        $post_id = $request['postId'];
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $like->delete();
            $post->likes -=1;
            $post->update();
            return $post->likes;            
        } 
        $like = new Like();
        $post->likes +=1;
        $like->like = 1;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();
        $post->update();
        return $post->likes;
    }
}
