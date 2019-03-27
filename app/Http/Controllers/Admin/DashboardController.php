<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Book;
use App\User;
use App\Comment;
use Auth;

class DashboardController extends Controller
{
    //
    public function index(){
    	$orders = Order::all();
    	$books = Book::all();
    	$users = User::all();
    	$comments = Comment::orderBy('id', 'DESC')->get();
    	return view('admin.index', compact('orders', 'books', 'users', 'comments'));
    }
}
