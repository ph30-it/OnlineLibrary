<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Book;
use App\Category;

class BookController extends Controller
{
    public function index(){
    	$books = Book::orderBy('id', 'DESC')->paginate(50);
    	return view('admin.books.index', compact('books'));
    }

    public function showAddBook(){
        $categories = Category::all();
    	return view('admin.books.create', compact('categories'));
    }

    public function create(BookRequest $request){
        if(!Category::find($request->category)){
            return redirect()->back()->with(['class'=>'danger','message'=>'Danh mục không tồn tại.']);
        }
        $data = $request->except('_token');
        $data['categories_id'] = $request->category;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $filename = md5(time()).'.jpg';
            $file->move(public_path('/uploads/'), $filename);
            $data['img'] = $filename;
        }
        else{
            $data['img'] = 'default.jpg';
        }
    	
    	if($book = Book::create($data)){
    		return redirect()->route('showEditBook', $book->id)->with(['class'=>'success','message'=>'Thêm sách thành công.']);
    	}
        else{
            return redirect()->back()->with(['class'=>'danger','message'=>'Lỗi hệ thống, thử lại sau.']);
        }
    }

    public function showEditBook($id){
        $categories = Category::all();
        if($book = Book::find($id)){
            return view('admin.books.edit', compact(['book', 'categories']));
        }
        else{
            return redirect()->route('ListBook');
        }
    }

    public function update(BookRequest $request, $id){
        if($book = Book::find($id)){
            if(!Category::find($request->category)){
                return redirect()->back()->with(['class'=>'danger','message'=>'Danh mục không tồn tại.']);
            }
            $data = $request->except('_token');
            $data['categories_id'] = $request->category;
            if($request->hasFile('img')){
                $file = $request->file('img');
                $filename = ($book->img == 'default.jpg') ? md5(time()).'.jpg' : $book->img;
                $file->move(public_path('/uploads/'), $filename);
                $data['img'] = $filename;
            }
            if($book->update($data)){
                return redirect()->back()->with(['class'=>'success','message'=>'Thay đổi thành công.']);
            }
        }
        
    }
    
    public function search(Request $request){
        $books = Book::where('id', 'like', "%$request->key%")->orwhere('name', 'like', "%$request->key%")->orwhere('price', 'like', "%$request->key%")->orwhere('describes', 'like', "%$request->key%")->orwhere('published_year', 'like', "%$request->key%")->orwhere('author', 'like', "%$request->key%")->orwhereHas('category', function ($query) use ($request) {
            return $query->where('name', 'like', "%$request->key%");
        })->orderBy('id', 'DESC')->paginate(50);
        return view('admin.books.index', compact('books'));
    }

    public function delete(Request $request){
        $data = $request->only('id');
        if($book = Book::find($data['id'])){
            if($book->delete()){
                return response()->json(['error' => 0], 200);
            }
        }
        return response()->json(['error' => 1], 200);
    }
}
