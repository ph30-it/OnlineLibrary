<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index(){
    	$comments = Comment::orderBy('id', 'DESC')->paginate(50);
    	return view('admin.comments.index', compact('comments'));
    }

    public function delete(Request $request){
        $data = $request->only('id');
        if($comment = Comment::find($data['id'])){
            if($comment->delete()){
                return response()->json(['error' => 0], 200);
            }
        }
        return response()->json(['error' => 1], 200);
    }

    public function search(request $request){
        $comments = Comment::whereHas('user', function ($query) use ($request){
            return $query->WhereRaw("concat(firstname, ' ', lastname) like '%$request->key%' ");
        })->orWhere('id', 'like', "%$request->key%")->orWhereHas('book', function ($query) use ($request){
        	return $query->where('name', 'like', "%$request->key%");
        })->orWhere('comment', 'like', "%$request->key%")->orderBy('id', 'DESC')->paginate(50);
        return view('admin.comments.index', compact('comments'));
    }
}
