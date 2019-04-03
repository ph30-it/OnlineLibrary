<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use Auth;
use DB;

class RatingController extends Controller
{
    public function getRatingPaginate(Request $request)
    {
        $data = Rating::where('book_id','=',$request->book_id);
    	$number_comment = $data->count();
        if($request->number_comment != 0){
            $number_comment = $request->number_comment;
        }
        $returned_data = null;
        if($request->number_star != 0){
            $returned_data = $data->where('star_number','=',$request->number_star)->paginate($number_comment);
        }else{
            $returned_data = $data->paginate($number_comment);
        }

        return view('layouts.user_comment_section',['data' => $returned_data]);
    }

    public function Rating(Request $request)
    {
    	$data = $request->only('comment','star_number','user_id','book_id');
    	if(Rating::updateOrCreate($data)){
            return back()->with('status','success !');
        }else{
            return back()->with('status','Database !');
        }
    }

    public function destroy(Request $request)
    {
        $rating = Rating::where('user_id','=',Auth::user()->id)->where('book_id','=',$request->id)->first();
        if ($rating->delete()) {
            return back()->with('status','Delete success !');
        }else{
            return back()->with('status','Error Database !');
        }
    }
}
