<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::orderBy('id', 'DESC')->paginate(50);
    	return view('admin.category.index', compact('categories'));
    }

    public function store(request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:categories'
        ], [
            'name.required' => 'Tên danh mục rỗng',
            'name.unique' => 'Tên danh mục đã tồn tại'
        ]);
        if($validator->passes()){

            if($category = Category::create(['name' => $request->name])){
                return response()->json(['error' => 0, 'id' => $category->id]);
            }
            else{
                return response()->json(['error' => 1, 'message' => 'Lỗi, thử lại sau']);
            }

        }
        else{
            return response()->json(['error' => 1, 'message' => $validator->errors()->first()]);
        }
    }

    public function update(request $request){
        if($category = Category::find($request->id)){
            $newname = ($request->name !== NULL) ? $request->name : $category->name;
            if($category->update(['name' => $newname])){
                return response()->json(['error' => 0, 'message' => $newname]);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Không tìm thấy danh mục']);
    }

    public function destroy(request $request){
        $data = $request->only('id');
        if($category = Category::find($data['id'])){
            if($category->delete()){
                return response()->json(['error' => 0, 'message' => 'Đã xóa danh mục']);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Không tìm thấy danh mục']);
    }
}
