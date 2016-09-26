<?php
namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


/**
* 
*/
class PostController extends Controller
{

	public function getDashboard()
	{

		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('dashboard', ['posts' => $posts]);
	}

	public function postCreatePost(Request $request)
	{
		//Validation

		$this->validate($request, [
			'body' => 'required|max:1000'
		]);


		//Create Post
		$post = new Post();
		$post ->body = $request['body'];
		$message = 'Error occured';

		if ($request->user()->posts()->save($post)) {
			$message = 'Post Successful';
		}
		return redirect()->route('dashboard')->with(['message' => $message]);


	}

	public function getDeletePost($post_id)
	{
		$post = Post::where('id', $post_id)->first();

		if(Auth::user() != $post->user){
			return redirect()->back();
		}

		$post->delete();
		return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted']);
	}


	public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }
}