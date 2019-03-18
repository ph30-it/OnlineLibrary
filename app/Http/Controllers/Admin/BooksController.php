<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BooksRequest;
use App\Book;
use App\Categories;

class BooksController extends Controller
{
    public function index(){
    	$books = Book::with('categories')->get();
    	return view('admin.books.index', compact('books'));
    }

    public function showCreateBooks(){
        $categories = Categories::all();
    	return view('admin.books.create', compact('categories'));
    }

    public function create(BooksRequest $request){
    	$data = $request->only('name','author', 'published_year', 'price', 'quantity', 'img', 'categories_id', 'describes');
        if($request->hasFile('img')){
            $file = $request->file('img');
            $filename = md5(time()).'.jpg';
            $file->move(public_path('/uploads/'), $filename);
            $data['img'] = $filename;
        }
        else{
            $data['img'] = 'default.jpg';
        }
    	
    	if(Book::create($data)){
    		return redirect()->back()->with(['class'=>'success','message'=>'Thêm sách thành công.']);
    	}
        else{
            return redirect()->back()->with(['class'=>'danger','message'=>'Lỗi hệ thống.']);
        }
    }

    public function showEditBooks($id){
        $categories = Categories::all();
        $book = Book::find($id);
        if($book){
            return view('admin.books.edit', compact(['book', 'categories']));
        }
        else{
            return redirect()->route('listBooks');
        }
    }

    public function update(BooksRequest $request, $id){
        $book = Book::find($id);
        $data = $request->only('name','author', 'published_year', 'price', 'quantity', 'img', 'categories_id', 'describes');
        if($request->hasFile('img')){
            $file = $request->file('img');
            $filename = $book->img;
            $file->move(public_path('/uploads/'), $filename);
        }
        if($book){
            if($book->update($data)){
                return redirect()->back()->with(['class'=>'success','message'=>'Sửa sách thành công.']);
            }
            else{
                return redirect()->back()->with(['class'=>'danger','message'=>'Lỗi hệ thống.']);
            }
        }
        else{
            return redirect()->route('listBooks');
        }
    }
    
    public function delete(Request $request){
        $data = $request->only('id');
        $book = Book::find($data['id']);
        if($book){
            $book->delete();
        }
        return redirect()->route('listBooks');
    }
}
