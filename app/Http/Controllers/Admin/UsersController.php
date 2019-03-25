<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    //
    public function index(){
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    public function showCreateUser(){
    	return view('admin.users.create');
    }

    public function create(UsersRequest $request){
    	$data = $request->only('email', 'gender', 'password', 'address', 'phone', 'firstname', 'lastname', 'roles');
    	$data['password'] = bcrypt($data['password']);
    	if(User::create($data)){
    		return redirect()->back()->with(['class' => 'success', 'message' => 'Thêm thành viên thành công.']);
    	}
    	else{
    		return redirect()->back()->with(['class' => 'danger', 'message' => 'Lỗi hệ thống.']);
    	}

    }

    public function showEditUser($id){
    	$user = User::find($id);
        if($user){
            return view('admin.users.edit', compact('user'));
        }
        else{
            return redirect()->route('listUsers');
        }
    }

    public function update(UpdateUserRequest $request, $id){
    	if($request->password === null){
    		$data = $request->only('gender', 'phone', 'firstname', 'lastname', 'roles', 'address');
    	}
    	else{
    		$data = $request->only('gender', 'phone', 'firstname', 'lastname', 'roles', 'address', 'password');
    		$data['password'] = bcrypt($data['password']);
    	}
    	$user = User::find($id);
    	if($user){
    		if($user->update($data)){
    			return redirect()->back()->with(['class' => 'success', 'message' => 'Cập nhật thành công.']);
			}
    		else{
    			return redirect()->back()->with(['class' => 'danger', 'message' => 'Lỗi hệ thống.']);
    		}
    	}
    	else{
    		return redirect()->route('listUsers');
    	}
    }

    public function delete(Request $request){
    	$user = User::find($request->id);
        if($user){
            $user->delete();
        }
        return redirect()->back();
    }
}
