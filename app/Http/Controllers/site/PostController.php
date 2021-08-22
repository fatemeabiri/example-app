<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redis;
use App\Models\Post;
use App\Policies\PostPolicy;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
        //I use POST POLICY
    }
    public function index( )
    {
        $posts = collect();
        $postIds = Redis::zrevrange('post_time', 0, 10);
//        dd($postIds);
        foreach ($postIds as $postId) {
            $posts->push(Redis::hgetall($postId) );
     }
//dd($posts);
        return view( 'site.post.index',compact('posts'));
    }
    public function create(){
        if (! Gate::allows('create-post'))
              abort(403);

            return view('site.post.create');
    }
    public function show($id)
    {
//        if (! Gate::allows('show-post'))
//            abort(403);
        $comments = collect();
        $postKey = "posts:".$id;
        $post = Redis::hgetall($postKey);
        $commentIds=Redis::zrevrange(
            $postKey.":comments", 0, -1);
        foreach ($commentIds as $commentId) {
            if (empty(Redis::hgetall($commentId)))
                continue;
            $comments->push(Redis::hgetall($commentId));
        }
//dd(compact('post','comments'));
        return view('site.post.show',compact('post','comments'));
    }

    public function edit($postid){
        $npost=new post();
        $npost->post_id=$postid;
        $npost->user_id=Auth::id();
//        dd($npost);
        if (! Gate::allows('update-post',$npost))
            abort(403);

        $postKey = "posts:".$postid;
        $post=Redis::hgetall($postKey);
        $npost->body=Arr::get($post,'body');
//        dd($post);
        return view('site.post.edit',['post'=>$npost]);

    }
    public function update(Request $request,$postid){
        $npost=new post();
        $npost->post_id=$postid;
        $npost->user_id=Auth::id();
        if (! Gate::allows('update-post',$npost))
            abort(403);

            $postKey = "posts:".$postid;
            Redis::hmset($postKey,"body", $request->get( 'body'));
            return redirect( '/posts/' );
//                ->with('message','Post Updated Succesfully' );
        }
    public function store(Request $request)
    {
        if (! Gate::allows('create-post'))
            abort(403);

        $postiId = Redis::command('incr', ['post_id']);
        $postKey = "posts:".$postiId;
        //key is POSTS:1[...]:
        Redis::hmset($postKey,
            "id", $postiId,
            "body", $request->get( 'body'),
            "user", Auth::user()->name,
            "created_at", Carbon::now(),
            "user_id", Auth::id(),
            "Like", 0
        );
        Redis::zadd( 'post_time',
            Carbon::now( )->timestamp, $postKey );
     return redirect( 'posts/' );
//         ->with('messages','Post Added Succesfully' );
  }
    public function destroy($postid)
    {
        $npost=new post();
        $npost->post_id=$postid;
        $npost->user_id=Auth::id();
        if (! Gate::allows('destroy-post',$npost))
            abort(403);
        $postKey = 'posts:'.$postid;
        Redis::zrem('post_time', $postKey);
        Redis::hdel($postKey,
            "id",
            "body",
            "user",
            "created_at",
            "user_id",
            "lLike"
    );
    return redirect('posts/' );
       // ->withErrors('Post Deleted Successfully');
 }
}
