<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
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
        $categories = Categories::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }

        $booksData = array();
        $list = array();
        for($i = 0;$i < 3;$i++){
            $books = $cate[$i]->Books()->where('quantity','>',0)->orderBy('created_at','DESC')->take(7)->get();
            array_push($booksData,$books);
            foreach($books->toArray() as $key => $value){
                $list[] = $value['id'];
            }
        }
        $test = Rating::with('book')->selectRaw('book_id, avg(star_number) as rating')->groupBy('book_id')->whereIn('book_id',[$list])->get()->toArray();
        $rate = [];
        foreach ($test as $key => $value) {
            $rate[$value['book_id']] = $value['rating'];
        }

        /*$test1 = Book::with('ratings')->join('ratings','books.id', '=', 'ratings.book_id')->where('books.categories_id','=',1)->where('books.quantity','>',0)->selectRaw('book_id, avg(star_number) as rating')->groupBy('book_id')->get();
        dd($test1);
        */
        return view('home', [
            'categories' => $cate,
            'databooks' => $booksData,
            'rate' => $rate
        ]);
    }
}
