<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Categories;

class CategoriesController extends Controller
{
    public function index(){
    	$categories = Categories::all();
    	return view('admin.category.index', compact('categories'));
    }
    
    public function showCreateCategory(){
    	return view('admin.category.create');
    }

    public function create(CategoryRequest $request){
    	$data = $request->only('name');
    	if(Categories::create($data)){
    		return redirect()->back()->with(['class'=>'success', 'message' => 'Thêm danh mục thành công']);
    	}
    	else{
    		return redirect()->back()->with(['class'=>'danger', 'message' => 'Lỗi không xác định']);
    	}
    }

    public function showEdit($id){
        $category = Categories::find($id);
        if($category){
            return view('admin.category.edit', compact('category'));
        }
        else{
            return redirect()->route('listCategory');
        }
    }

    public function update(Request $request, $id){
        $this->validate($request, ['name' => 'required|string'],[
            'name.required' => 'Tên danh mục không được bỏ trống.'
        ]);
        $data = $request->only('name');
        $category = Categories::find($id);
        if($category){
            if($category->update($data)){
                return redirect()->back()->with(['class'=>'success', 'message' => 'Chỉnh sửa danh mục thành công']);
            }
            else{
                return redirect()->back()->with(['class'=>'danger', 'message' => 'Lỗi không xác định']);
            }
        }
        else{
            return redirect()->route('listCategory');
        }
        
    }

    public function delete(Request $request){
        $category = Categories::find($request->id);
        if($category){
            $category->delete();
        }
        return redirect()->back();
    }
}
