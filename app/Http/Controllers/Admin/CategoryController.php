<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::orderBy('id', 'DESC')->paginate(50);
    	return view('admin.category.index', compact('categories'));
    }

    public function create(CategoryRequest $request){
    	$data = $request->only('name');
    	if(category::create($data)){
    		return redirect()->route('ListCategory');
    	}
    	else{
    		return redirect()->back()->with(['class'=>'danger', 'message' => 'Lỗi không xác định']);
    	}
    }

    public function update(request $request){
        if($category = Category::find($request->id)){
            $newname = ($request->name !== '') ? $request->name : $category->name;
            if($category->update(['name' => $newname])){
                return response()->json(['error' => 0], 200);
            }
        }
        return response()->json(['error' => 1], 200);
        
    }

    public function delete(Request $request){
        $data = $request->only('id');
        if($category = Category::find($data['id'])){
            if($category->delete()){
                return response()->json(['error' => 0], 200);
            }
        }
        return response()->json(['error' => 1], 200);
    }
}
