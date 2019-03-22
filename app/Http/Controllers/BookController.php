<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function showBookDetailByID($id)
    {
    	$data = Book::where('id','=',$id)->get();
    	return view('book',[
    		'book' => $data[0]
    	]);
    }
}
