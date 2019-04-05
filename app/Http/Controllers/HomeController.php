<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;
use App\Rating;
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
        $categories = Category::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        $booksData = array();
        $list = array();
        for($i = 0;$i < 3;$i++){
            $books = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where([['quantity','>',0], ['category_id','=',$cate[$i]->id]])->orderByDesc('average_rating')->take(10)->get();
            array_push($booksData,$books);
        }
        return view('home', [
            'categories' => $cate,
            'databooks' => $booksData
        ]);
    }
}
