<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use DB;

class CategoryController extends Controller
{
	public function listBooksById($category_id,Request $request)
    {
        $categories = Category::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        $page_number = isset($request->paginate) ? $request->paginate : 10;
        $orderby= isset($request->orderby) ? $request->orderby: 0;
        switch ($orderby) {
            case 1:  //name Z-A
            $data = Book::where('category_id','=',$category_id)->orderBy('name','DESC')->paginate($page_number);
            break;
            case 2: // newest
            $data = Book::where('category_id','=',$category_id)->orderBy('created_at','DESC')->paginate($page_number);
            break;
            case 3: //oldest
            $data = Book::where('category_id','=',$category_id)->orderBy('created_at')->paginate($page_number);
            break;
            case 4: //rating up
            $data = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderBy('average_rating')->paginate($page_number);
            break;
            case 5: //rating down
            $data = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderByDesc('average_rating')->paginate($page_number);
            break;
            default: //name A-Z
            $data = Book::where('category_id','=',$category_id)->orderBy('name')->paginate($page_number);
            break;
        }

        if($data->toArray()['total'] == 0 || $data == null){
            return abort(404);
        }
        return view('category',[
            'data' => $data,
            'categories' => $cate,
            'page_selection' => $page_number,
            'orderby' => $orderby
        ]);
    }

    public function listBookPaginate(Request $request){
        $category_id = $request->category;
        if($request->pagination == 0){
            $page_number = Category::find($category_id)->Books()->count();
        }else{
            $page_number = $request->pagination;
        }
        $orderby= isset($request->orderby) ? $request->orderby: 0;
        switch ($orderby) {
            case 1:  //name Z-A
            $data = Book::where('category_id','=',$category_id)->orderBy('name','DESC')->paginate($page_number);
            break;
            case 2: // newest
            $data = Book::where('category_id','=',$category_id)->orderBy('created_at','DESC')->paginate($page_number);
            break;
            case 3: //oldest
            $data = Book::where('category_id','=',$category_id)->orderBy('created_at')->paginate($page_number);
            break;
            case 4: //rating up
            $data = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderBy('average_rating')->paginate($page_number);
            break;
            case 5: //rating down
            $data = Book::withCount(['ratings as average_rating' => function($query) {$query->select(DB::raw('coalesce(avg(star_number),0)')); }])->where('category_id','=',$category_id)->orderByDesc('average_rating')->paginate($page_number);
            break;
            default: //name A-Z
            $data = Book::where('category_id','=',$category_id)->orderBy('name')->paginate($page_number);
            break;
        }
        return view('layouts.list_book',[
         'data' => $data,
         'page_selection' => $page_number,
         'orderby' => $request->orderby
     ]);
    }
}
