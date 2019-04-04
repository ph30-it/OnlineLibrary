<?php

namespace App\Http\Controllers;

use App\igration;
use Illuminate\Http\Request;
use App\Categories;
use App\Book;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Categories::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        $max = Book::max('published_year');
        $min = Book::min('published_year');
        return view('search',[
            'categories' => $cate,
            'max' => $max,
            'min' => $min
        ]);
    }

    public function searchByName(Request $request)
    {
        $books = Book::where('name', 'like', '%' . $request->value . '%')->get();
        return response()->json($books); 
    }

}
