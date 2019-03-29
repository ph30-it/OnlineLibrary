<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use App\User;

class UserController extends Controller
{
	public function account(){
		return view('user.account');
	}

	public function edit_show(){
		return view('user.edit');
	}

	public function update(EditUserRequest $request){
		//dd($request);
    	if($request->password === null){
    		$data = $request->only('gender', 'phone', 'firstname', 'lastname', 'address');
    	}
    	else{
    		$data = $request->only('gender', 'phone', 'firstname', 'lastname', 'address', 'password');
    		$data['password'] = bcrypt($data['password']);
    	}
		$user = User::where('email',$request->email);
		if ($user->update($data)) {
			return redirect()->back()->with(['class' => 'success', 'message' => 'Update Success.']);
		}else{
			return redirect()->back()->with(['class' => 'danger', 'message' => 'Error Database.']);
		}

	}
}
