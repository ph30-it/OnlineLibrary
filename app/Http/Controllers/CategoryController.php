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
        $page_number = isset($request->pagination) ? $request->pagination : 10;
    	$data = Book::where('categories_id','=',$category_id)->paginate($page_number);
    	
        return view('category',[
        	'data' => $data,
        	'categories' => $categories,
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
