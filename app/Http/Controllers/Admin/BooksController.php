<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BooksRequest;
use App\Book;

class BooksController extends Controller
{
    public function index(){
    	$books = Book::with('categories')->get();
    	return view('admin.books.index', compact('books'));
    }
    public function showCreateBooks(){
    	return view('admin.books.create');
    }
    public function create(BooksRequest $request){
    	$data = $request->only('name','author', 'published_year', 'price', 'quantity', 'describes', 'img');
    	$data['img'] = 'uploa/hinhanh.jpg';
    	$data['categories_id'] = 1;
    	if(Book::create($data)){
    		return redirect()->back()->with(['class'=>'success','message'=>'Add Books Success']);
    	}
    }
}
