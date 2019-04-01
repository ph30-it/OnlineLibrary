<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Rating;
use App\Comment;
use Auth;

class BookController extends Controller
{
	public function showBookDetailByID($id)
	{
		$data = Book::where('id','=',$id)->get();
		if(count($data) == 0) abort(404);
    	$comment = Comment::where('book_id','=',$id)->get();
		$star_number = null;

    	if(Auth::check()){
    		$star = Rating::where('user_id','=',Auth::user()->id)->where('book_id','=',$id)->first();
    		if($star) $star_number = $star->star_number;
    	}

    	return view('book',[
    		'book' => $data[0],
    		'comments' => $comment,
    		'star_number' => $star_number
    	]);
	}
}
