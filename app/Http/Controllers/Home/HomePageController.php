<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;

class HomePageController extends Controller
{
    public function ShowHomePage(){
    	//load category
    	$categories = Category::all();
    	$booksData = array();

    	foreach($categories as $category){
    		$book = Book::where('categories_id','=',$category->id)->take(7)->get();
    		array_push($booksData,$book);
    	}

    	return \View::make('Home.home')->with('data',['categories' => $categories, 'books' => $booksData]);
    }

    public function DirectToCategoryPage($category_id){
        $data = Book::where('categories_id','=',$category_id)->get();

        return \View::make('Category.category_page')->with('data',$data);
    }
}
