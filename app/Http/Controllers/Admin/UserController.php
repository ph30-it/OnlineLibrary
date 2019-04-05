<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(){
    	$users = User::orderBy('id', 'DESC')->paginate(50);
    	return view('admin.users.index', compact('users'));
    }

    public function create(){
    	return view('admin.users.create');
    }

    public function store(UsersRequest $request){
    	$data = $request->except('_token');
    	$data['password'] = bcrypt($data['password']);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $filename = md5(time()).'.jpg';
            $file->move(public_path('/uploads/'), $filename);
            $data['image'] = $filename;
        }
        else{
            $data['image'] = 'default.jpg';
        }
    	if($user = User::create($data)){
    		return redirect()->route('User.Show', $user->id)->with(['class' => 'success', 'message' => 'Thêm thành viên thành công.']);
    	}
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Lỗi hệ thống, thử lại sau.']);
    }

    public function edit($id){
        if($user = User::find($id)){
            return view('admin.users.edit', compact('user'));
        }
        return redirect()->route('User.List');
    }

    public function update(UserUpdateRequest $request, $id){
    	$data = $request->except('_token', 'email');
    	if($user = User::find($id)){
            $data['password'] = isset($data['password']) ? bcrypt($data['password']) : $user->password;
            if($request->hasFile('img')){
                $file = $request->file('img');
                $filename = ($user->image == 'avatar-default.jpg' || $user->image == NULL) ? md5(time()).'.jpg' : $user->image;
                $file->move(public_path('/uploads/'), $filename);
                $data['image'] = $filename;
            }
    		if($user->update($data)){
    			return redirect()->route('User.Show', $user->id)->with(['class' => 'success', 'message' => 'Thay đổi thông tin thành viên thành công.']);
			}
    	}
    	return redirect()->route('User.List');
    }

    public function show($id){
        if($user = User::find($id)){
            return view('admin.users.detail', compact('user'));
        }
        return redirect()->route('User.List');
    }

    public function destroy(Request $request){
        $data = $request->only('id');
        if($user = User::find($data['id'])){
            if($user->delete()){
                return response()->json(['error' => 0, 'message' => 'Xóa thành viên thành công']);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Không tìm thấy thành viên']);
    }

    public function search(request $request){
        $users = User::WhereRaw("concat(firstname, ' ', lastname) like '%$request->key%' ")->orWhere('email', 'like', "$request->key")->orWhere('phone', 'like', "$request->key")->paginate(50);
        return view('admin.users.index', compact('users'));
    }

    public function apiSearch(request $request){
        $key = ($request->q !== null) ? $request->q : '';
        $users = User::WhereRaw("concat(firstname, ' ', lastname) like '%$request->key%' ")->orWhere('email', 'like', "$request->key")->orWhere('phone', 'like', "$request->key")->get();
        return response()->json($users->map(function($item){
            $data = [
                'id' => $item->id,
                'text' => $item->firstname.' '.$item->firstname
            ];
            return $data;
        }));
    }
}
