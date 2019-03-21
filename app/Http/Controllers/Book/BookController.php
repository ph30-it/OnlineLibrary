<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;

class BookController extends Controller
{
    public function ShowCategoryPageByID($category_id){
    	$data = Book::where('categories_id','=',$category_id)->get();

        return \View::make('Category.category_page')->with('data',$data);
    }

    public function ShowBookDetailPage($book_id){
    	$data = Book::where('id','=',$book_id)->get();

    	return \View::make('Book.book_detail_page')->with('book',$data[0]);
    }
}
