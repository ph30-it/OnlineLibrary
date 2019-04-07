<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;
use App\Rating;
use App\User;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cate= Category::whereHas('books' , function($query) {
           $query->where('quantity' , '>' ,0  );
        }, '>', 0)->get();
        $booksData = array();
        $list = array();
        for($i = 0;$i < 3;$i++){
            $books = Book::withCount(['ratings as average_rating' => function($query) {
                $query->select(DB::raw('coalesce(avg(star_number),0)'));
            }])->where([['quantity','>',0], ['category_id','=',$cate[$i]->id]])->orderByDesc('average_rating')->take(10)->get();
            array_push($booksData,$books);
        }

        $top_user = User::withCount(['Orders as count_order' => function($query) {
            $query->select(DB::raw('coalesce(count(price),0)'));
        }])->take(10)->get();
        $top_rating = Rating::with('book')->whereNotNull('comment')->orderByDesc('star_number')->take(7)->get();

        return view('home', [
            'categories' => $cate,
            'databooks' => $booksData,
            'top_user' => $top_user,
            'top_rating' => $top_rating
        ]);
    }
}
