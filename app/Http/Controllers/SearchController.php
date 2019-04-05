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
        //search param
        $categories = Categories::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        if ($request->keysearch == null) {
            return view('search',['categories' => $cate,'data' => null])->with(['class' => 'warning', 'message' => 'Please input key to search']);
        }
        $books = Book::where('name', 'like', '%' . $request->keysearch . '%')->paginate(10);

        return view('search',[
            'categories' => $cate,
            'data' => $books
        ]);
    }

    public function searchByName(Request $request)
    {
        $books = Book::where('name', 'like', '%' . $request->value . '%')->get();
        return response()->json($books); 
    }

}
