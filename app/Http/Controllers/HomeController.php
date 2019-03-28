<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Book;

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
        $categories = Categories::all();
        $list_category = Categories::take(2)->get();
        $booksData = array();
        foreach($list_category as $key => $category ){
            $book = Book::where('categories_id','=',$category->id)->where('quantity','>',0)->take(7)->get();
            array_push($booksData,$book);
        }
        return view('home', [
            'categories' => $categories,
            'books' => $booksData
        ]);
    }
}
