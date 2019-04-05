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

    public function apiSearch(request $request){
        $key = ($request->q !== null) ? $request->q : '';
        $books = Book::where('name', 'like', "%$key%")->orderBy('id', 'DESC')->get();
        return response()->json($books->map(function($item){
            $data = [
                'id' => $item->id,
                'text' => $item->name
            ];
            return $data;
        }));
    }

    public function create(){
        $categories = Category::all();
    	return view('admin.books.create', compact('categories'));
    }

    public function store(BookRequest $request){
        if(!Category::find($request->category)){
            return redirect()->back()->with(['class'=>'danger','message'=>'Danh mục không tồn tại.']);
        }
        $data = $request->except('_token');
        $data['category_id'] = $request->category;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $filename = '/uploads/'.md5(time()).'.jpg';
            $file->move(public_path('/uploads/'), $filename);
            $data['img'] = $filename;
        }
        else{
            $data['img'] = '/uploads/default.jpg';
        }
    	
    	if($book = Book::create($data)){
    		return redirect()->route('Book.Edit', $book->id)->with(['class'=>'success','message'=>'Thêm sách thành công.']);
    	}
        else{
            return redirect()->back()->with(['class'=>'danger','message'=>'Lỗi hệ thống, thử lại sau.']);
        }
    }

    public function edit($id){
        $categories = Category::all();
        if($book = Book::find($id)){
            return view('admin.books.edit', compact(['book', 'categories']));
        }
        else{
            return redirect()->route('Book.List');
        }
    }

    public function update(BookRequest $request, $id){
        if($book = Book::find($id)){
            if(!Category::find($request->category)){
                return redirect()->back()->with(['class'=>'danger','message'=>'Danh mục không tồn tại.']);
            }
            $data = $request->except('_token');
            $data['category_id'] = $request->category;
            if($request->hasFile('img')){
                $file = $request->file('img');
                $filename = ($book->img == 'default.jpg' || $book->img == NULL) ? md5(time()).'.jpg' : $book->img;
                $file->move(public_path('/uploads/'), $filename);
                $data['img'] = $filename;
            }
            if($book->update($data)){
                return redirect()->back()->with(['class'=>'success','message'=>'Thay đổi thành công.']);
            }
        }
        
    }

    public function destroy(Request $request){
        $data = $request->only('id');
        if($book = Book::find($data['id'])){
            if($book->delete()){
                return response()->json(['error' => 0, 'message' => 'Xóa sách thành công']);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Không tìm thấy sách']);
    }
    
    public function search(Request $request){
        $books = Book::where('id', 'like', "%$request->key%")->orwhere('name', 'like', "%$request->key%")->orwhere('price', 'like', "%$request->key%")->orwhere('describes', 'like', "%$request->key%")->orwhere('published_year', 'like', "%$request->key%")->orwhere('author', 'like', "%$request->key%")->orwhereHas('category', function ($query) use ($request) {
            return $query->where('name', 'like', "%$request->key%");
        })->orderBy('id', 'DESC')->paginate(50);
        return view('admin.books.index', compact('books'));
    }
}
