<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
	public function showBookDetailByID($id)
	{
		$data = Book::where('id','=',$id)->get();
		if(count($data) == 0) abort(404);
		return view('book',[
			'book' => $data[0]
		]);
	}
}
