<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
	public function addComment(Request $request){
    	$content = $request->content;

    	$comment = new Comment;
    	$comment->user_id = Auth::user()->id;
    	$comment->comment = $content;
    	$comment->book_id = $request->book_id;
    	$comment->save(); 

    	return json_encode($comment);
    }
}
