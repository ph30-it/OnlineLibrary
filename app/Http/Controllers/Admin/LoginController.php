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
        if (\Auth::attempt($data)) {
        	//dd(\Auth::user());
        	if (\Auth::user()->roles == 1) {
        		return redirect()->route('admin-home'); //return to admin page
         	}
            //$request->session()->regenerate();
            return redirect()->route('home'); //return to home page
        }
        return redirect()->route('form-login'); // todo:  make error when login
    }

    public function logout(){
        \Auth::logout();
        return redirect()->route('form-login');
    }
}
