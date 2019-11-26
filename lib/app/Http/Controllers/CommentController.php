<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function getCommentShow(){
        $count_comment = Comment::all()->count();
        $data = Comment::where('comment_id','>',0)->orderBy('comment_id','desc')->get();
        $arr = [
            'count_comment'=>$count_comment,
            'data'=>$data,
        ];
        return view('backend.comment',$arr);
    }
    public function getCommentDelete($id){
        $cmt = Comment::find($id);
        $cmt->delete();
        return back();
    }
}
