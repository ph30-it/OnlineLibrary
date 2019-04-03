<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Categories;

class CategoryController extends Controller
{
	public function listBooksById($category_id,Request $request)
    {
        $categories = Categories::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        $page_number = isset($request->paginate) ? $request->paginate : 10;
        $data = Book::where('categories_id','=',$category_id)->orderBy('created_at','DESC')->paginate($page_number);
        if($data->toArray()['total'] == 0 || $data == null){
            return abort(404);
        }
        foreach($data as $book){
            $book['rating'] = $book->ratings()->avg('star_number');
        }
        return view('category',[
        	'data' => $data,
        	'categories' => $cate,
            'page_selection' => $page_number
        ]);

    }

    public function listBookPaginate(Request $request){
    	if($request->pagination == 0){
    		$pagination = Book::count();
    	}else{
            $pagination = $request->pagination;
        }
        $data = Book::where('categories_id','=',$request->category)->paginate($pagination);
        
        return view('layouts.list_book',[
        	'data' => $data,
            'page_selection' => $pagination
        ]);
    }
}
