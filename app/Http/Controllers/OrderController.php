<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Book;

class OrderController extends Controller
{
    public function listOrderByStatus(Request $request){
    	$order = Order::where('status','=',$request->status)->get();
    	/*$result = [];
    	foreach ($order as $value) {
    		$o = Order::find($value->id);
    		$result[$value->id] = $o;
    	}*/
    	return view('user.order',['data' => $order]);
    }
}
