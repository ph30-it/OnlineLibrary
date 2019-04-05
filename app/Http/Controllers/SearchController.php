<?php

namespace App\Http\Controllers;

use App\igration;
use Illuminate\Http\Request;
use App\Category;
use App\Book;
use DB;

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
        $categories = Category::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        $orderby = (isset($request->orderby)) ? $request->orderby : 0;
        if ($request->keysearch == null) {
            return view('search',['categories' => $cate,'data' => null,'orderby' => $orderby])->with(['class' => 'warning', 'message' => 'Please input key to search']);
        }
        if($orderby == 0){
            $books = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('name', 'like', '%' . $request->keysearch . '%')->orderByDesc('average_rating')->paginate(10);
        }else{
            $books = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('name', 'like', '%' . $request->keysearch . '%')->orderBy('average_rating')->paginate(10);
        }
        return view('search',[
            'key' => $request->keysearch,
            'categories' => $cate,
            'data' => $books,
            'orderby' => $orderby
        ]);
    }

    public function searchByName(Request $request)
    {
        $books = Book::where('name', 'like', '%' . $request->value . '%')->get();
        return response()->json($books); 
    }

    public function searchbyajax(Request $request)
    {
        $category_id = $request->category;
        $orderby = $request->orderby;
        if($request->keysearch == "") return view('layouts.search_section',[
            'key' => null,
            'data' => null,
            'orderby' => $orderby
        ]);
        $books = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }]);
        if($category_id >= 0){
            $books = $books->where('category_id','=',$category_id);
        }
        if($orderby == 0){
            $books = $books->where('name', 'like', '%' . $request->keysearch . '%')->orderByDesc('average_rating')->paginate(10);
        }else{
             $books = $books->where('name', 'like', '%' . $request->keysearch . '%')->orderBy('average_rating')->paginate(10);
        }
        return view('layouts.search_section',[
            'key' => $request->keysearch,
            'data' => $books,
            'orderby' => $orderby
        ]);
    }
}
