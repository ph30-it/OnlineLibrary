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
		$data = Book::where('id','=',$id)->get();
		if(count($data) == 0) abort(404);
        $ratings = Rating::where('book_id','=',$id)->orderBy('created_at','DESC')->get();
        if($request->has('page')){
            $ratings = Rating::where('book_id','=',$id)->orderBy('created_at','DESC')->paginate(5);
        }

        $isUserCommented = Auth::check() ? $this->checkIfUserRated($id) : false;
        $user_rating = Auth::check() ? $this->getUserRating($id) : null;

        $percentOfRatings = array();
        array_push($percentOfRatings, $this->getPercentationOfRating(1,$id));
        array_push($percentOfRatings, $this->getPercentationOfRating(2,$id));
        array_push($percentOfRatings, $this->getPercentationOfRating(3,$id));
        array_push($percentOfRatings, $this->getPercentationOfRating(4,$id));
        array_push($percentOfRatings, $this->getPercentationOfRating(5,$id));
        $average_avalate = $percentOfRatings[0]*1 + $percentOfRatings[1]*2 + $percentOfRatings[2]*3 + $percentOfRatings[3]*4 + $percentOfRatings[4]*5;
        $average_avalate = ceil($average_avalate/100);

        $count_comments = count($ratings);
        $num_comment = $request->has('num_comment') ? $request->num_comment : 0;
        $num_star = $request->has('num_star') ? $request->num_star : 0;
        return view('book',[
          'book' => $data[0],
          'ratings' => $ratings,
          'is_user_commented' => $isUserCommented,
          'user_rating' => $user_rating,
          'percent_of_ratings' => json_encode($percentOfRatings),
          'average_evalate' => $average_avalate,
          'count_comments' => $count_comments,
          'num_comment' => $num_comment,
          'num_star' => $num_star
      ]);
    }

    private function checkIfUserRated($book_id){
        $comment = Rating::where('user_id','=',Auth::user()->id)->where('book_id','=',$book_id)->first();
        if($comment) return true;
        return false;
    }

    private function getUserRating($book_id){
        $rating = Rating::where('user_id','=',Auth::user()->id)->where('book_id','=',$book_id)->first();
        if($rating) return $rating;
        return null;
    }



    private function getPercentationOfRating($star_number,$book_id){
        $count = count(Rating::where('book_id','=',$book_id)->get());
        $star_count = count(Rating::where('star_number','=',$star_number)->where('book_id','=',$book_id)->get());
        if($count > 0) return round($star_count * 100 / $count);
        return 0;
    }
}
