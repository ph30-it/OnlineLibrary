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
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        $booksData = array();
        for($i = 0;$i < 2;$i++){
            $books = $cate[$i]->Books()->where('quantity','>',0)->orderBy('created_at','DESC')->take(7)->get();
            foreach($books as $book){
                $book['rating'] = $book->ratings()->avg('star_number');
            }
            array_push($booksData,$books);
        }
        return view('home', [
            'categories' => $cate,
            'books' => $booksData
        ]);
    }
}
