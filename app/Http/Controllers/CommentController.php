<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Rate;
use App\User;
class CommentController extends Controller
{
    public function viewasdoscomments($user_id){
        $user = User::find($user_id);
        $comments = Comment::where('user_id',$user_id)->simplePaginate(30);
        $rate = Rate::where('user_id',$user_id)->first();
        
         return view('maindashboard.index',['content'=> 'viewcomments','title'=> 'Komentar dan Rating '.$user->name,'rating'=>$rate,'comments'=>$comments]);
    }
}
