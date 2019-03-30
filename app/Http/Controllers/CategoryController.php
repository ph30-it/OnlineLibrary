<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class CategoryController extends Controller
{
	public function listBooksById($category_id)
    {
    	$data = Book::where('categories_id','=',$category_id)->get();
        return view('category',[
        	'data' => $data
        ]);
    }
}
