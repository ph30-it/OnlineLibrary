<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Categories;
use DB;

class CategoryController extends Controller
{
	public function listBooksById($category_id,Request $request)
    {
        $categories = Categories::all();
        $cate = array();
        foreach ($categories as $category) {
            if ($category->Books()->count() > 0) {
                array_push($cate,$category);
            }
        }
        $page_number = isset($request->paginate) ? $request->paginate : 10;
        $orderby= isset($request->orderby) ? $request->orderby : 0;
        switch ($orderby) {
            case 1:
            $data = Book::where('categories_id','=',$category_id)->orderBy('name','DESC')->paginate($page_number);
            break;
            case 2:
            $data = Book::where('categories_id','=',$category_id)->orderBy('created_at','DESC')->paginate($page_number);
            break;
            case 3:
            $data = Book::where('categories_id','=',$category_id)->orderBy('created_at')->paginate($page_number);
            break;
            case 0:
            default:
            $data = Book::where('categories_id','=',$category_id)->orderBy('name')->paginate($page_number);
            break;
        }

        if($data->toArray()['total'] == 0 || $data == null){
            return abort(404);
        }
        return view('category',[
            'data' => $data,
            'categories' => $cate,
            'page_selection' => $page_number,
            'orderBy' => null
        ]);
    }

    public function listBookPaginate(Request $request){
        if($request->pagination == 0){
            $pagination = Book::count();
        }else{
            $pagination = $request->pagination;
        }
        if ($request->orderBy == 0) {
            $data = Book::where('categories_id','=',$request->category)->orderBy('name')->paginate($pagination);
        }else{
            $data = Book::where('categories_id','=',$request->category)->orderBy('name','DESC')->paginate($pagination);
        }
        return view('layouts.list_book',[
           'data' => $data,
           'page_selection' => $pagination,
           'orderBy' => $request->orderBy
       ]);
    }
}
