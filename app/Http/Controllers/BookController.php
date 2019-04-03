<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Rating;
use Auth;

class BookController extends Controller
{
	public function showBookDetailByID($id,Request $request)
	{
		$data = Book::find($id);
		if($data == null) abort(404);

		$user_rating = Auth::check() ? $data->ratings()->where('user_id','=',Auth::user()->id)->first() : null;

		$count_ratings = $data->ratings->count();
		$percentOfRatings = array();
		for($i = 1;$i <= 5;$i++){
			array_push($percentOfRatings,round($data->ratings->where('star_number','=',$i)->count()*100/$count_ratings));
		}
		$average_avalate = $percentOfRatings[0]*1 + $percentOfRatings[1]*2 + $percentOfRatings[2]*3 + $percentOfRatings[3]*4 + $percentOfRatings[4]*5;
		$average_avalate = round($average_avalate/150,1);

		$num_comment = $request->has('num_comment') ? $request->num_comment : 5;
		$num_star = $request->has('num_star') ? $request->num_star : 0;
		if($num_star == 0){
			$ratings = $data->ratings()->paginate($num_comment);
		}else{
			$ratings = $data->ratings()->where('star_number','=',$num_star)->paginate($num_comment);
		}
		return view('book',[
			'book' => $data,
			'ratings' => $ratings,
			'user_rating' => $user_rating,
			'percent_of_ratings' => json_encode($percentOfRatings),
			'average_evalate' => $average_avalate,
			'count_ratings' => $count_ratings,
			'num_comment' => $num_comment,
			'num_star' => $num_star
		]);
	}
}
