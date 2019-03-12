<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

     public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        dd($data);
        if (\Auth::attempt($data)) {
        	// dd(\Auth::user());
        	//if (\Auth::user()->role_id == 1) {
        	//	return redirect()->route('admin-home');
         	//}
             // $request->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->route('admin-form-login');
    }
}
