<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store','destroy');
    }
    public function index() {
        $post = Post::with(['user','likes'])->latest()->paginate(9);
        // dd($post);
        return view('posts.index', [
            "posts"=>$post,
        ]);
    }

    public function show(Post $post) {
        
       return view('posts.show',[
           "post"=>$post,
       ]);
    }

    public function store(Request $request) {
          $this->validate($request, [
            "body"=>"required",
          ]);

          $request->user()->posts()->create($request->only('body'));
          return back();
    } 
    
    public function destroy(Post $post) {
        $post->delete();
        return back();
    }
}
