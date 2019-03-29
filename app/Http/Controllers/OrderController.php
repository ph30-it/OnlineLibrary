<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Book;

class OrderController extends Controller
{
	public function orderstatus(Request $request){
		switch ($request->status) {
			case 1:
			return $this->orderWait();
			case 2:
			return $this->orderConfirmed();
			case 4:
			return $this->orderBorrowing();
			default:
			abort(404);
		}
	}

	public function orderWait(){
		$order = Order::where('status','=',1)->get();
		if(count($order) == 1){
			$result = Order::find($order[0]->id)->Book;
			return view('user.wait_order',['result' => 1,'order' => $order[0],'data' => $result]);
		}
		return view('user.wait_order',['result' => 0]);
	}

	public function orderConfirmed(){
		$order = Order::where('status','=',2)->get();
		if(count($order) == 1){
			$result = Order::find($order[0]->id)->Book;
			return view('user.confirmed_order',['result' => 1,'order' => $order[0],'data' => $result]);
		}
		return view('user.confirmed_order',['result' => 0]);
	}

	public function orderBorrowing(){
		$order = Order::where('status','=',4)->get();
		if(count($order) == 1){
			$result = Order::find($order[0]->id)->Book;
			return view('user.borrowing_order',['result' => 1,'order' => $order[0],'data' => $result]);
		}
		return view('user.borrowing_order',['result' => 0]);
	}

	public function cancel(request $request){
		$order = Order::find($request->id);
		if(!$order){
			return redirect()->back()->with(['class' => 'danger', 'message' => 'something wrong.']);
		}
		$order->update(['status' => 4]);
		$order->save();
		return redirect()->back()->with(['class' => 'success', 'message' => 'Cancel order id : ' . $request->id. ' success.']);
	}
}
