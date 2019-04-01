<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use Auth;

class RatingController extends Controller
{
    public function addStar(Request $request){
    	$book_id = $request->book_id;
    	$star_number = $request->star_number;
    	$user_id = Auth::user()->id;

    	Rating::updateOrCreate(['user_id' => $user_id,'book_id' => $book_id],[
    		'star_number' => $star_number
    	]);

    	return "success";
    }
}
