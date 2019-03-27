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
        $booksData = array();
        foreach($categories as $key => $category ){
            $book = Book::where('categories_id','=',$category->id)->take(7)->get();
            array_push($booksData,$book);
        }
        return view('home', [
            'categories' => $categories,
            'books' => $booksData
        ]);
    }
}
