<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redis;

class CommentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(Request $request )
    {
        if (! Gate::allows('create-post'))
            abort(403);

        $commentId = Redis::command('incr', ['comment_id']);
        $postId = $request->get( 'post_id');
        $postKey = "posts:".$postId;
        $commentKey = "comments:".$commentId;
        Redis::hmset($commentKey,
            "id", $commentId,
            "body", $request->get('body'),
            "user", Auth::user( )->name,
            "created_at", Carbon::now(),
            "user_id", Auth::id(),
            "Like", 0
    );
    Redis::zadd($postKey.":comments",
        Carbon::now( )->timestamp, $commentKey
     );
     return redirect('/posts/'.$postId );
       //  ->with('message','Comment Added Succesfully' );
 }

    public function destroy(Request $request ,$comment_id)
    {
        $postId= $request->get( 'post_id');
        $post=new Post();
        $post->post_id=$postId;
        $post->user_id=Auth::id();
        if (! Gate::allows('destroy-post',$post))
            abort(403);
        $commentId = $comment_id;
        $postKey = "posts:".$postId;
        $commentKey = 'comments:'.$commentId;
//        dd($postKey.':comments', $commentKey);
        Redis::zrem($postKey.':comments', $commentKey);
        Redis::hdel($commentKey,
            "id", "body", "user",
            "created_at", "user_id", "Like");
        return redirect('/posts/'.$postId );
        //   ->with('message','Comment Deleted Successfully' );
    }
//    public function update(Request $request )
//    {
//        $postId= $request->get( 'post_id');
//        $post=new Post();
//        $post->post_id=$postId;
//        $post->user_id=Auth::id();
//        if (! Gate::allows('update-post',$post))
//            abort(403);
//
//        $commentId = Redis::command('incr', ['comment_id']);
//        $postKey = "posts:".$postId;
//        $commentKey = "comments:".$commentId;
//        Redis::hmset($commentKey,
//            "id", $commentId,
//            "body", $request->get('body'),
//            "user", Auth::user( )->name,
//            "created_at", Carbon::now(),
//            "user_id", Auth::id(),
//            "Like", 0
//        );
//        Redis::zadd($postKey.":comments",
//            Carbon::now( )->timestamp, $commentKey
//        );
//        return redirect('/posts/'.$postId );
//        //  ->with('message','Comment Added Succesfully' );
//    }
//    public function Like(Request $request )
//    {
//        $commentKey = "comments:".$request->get('id');
//        Redis::hincrby($commentKey, "Like", 1);
//        return redirect( )->back( )
//            ->with('message','Saved Your Like');
//    }
//
//    public function dislike(Request $request )
//    {
//        $commentKey = "comments:".$request->get('id');
//        Redis::hincrby($commentKey, "Like", -1);
//        return redirect( )->back( )
//            ->with('message','Saved Your Dislike');
//    }
}
