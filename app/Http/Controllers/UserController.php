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

	public function update(Request $request){
    	//TODO: Validate
    	$data = $request->only('gender', 'phone', 'firstname', 'lastname', 'address');
    	$user = User::where('email',$request->email);
    	//TODO: udpate user
	}
}
