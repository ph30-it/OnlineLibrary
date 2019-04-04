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
			case 3:
			return $this->orderCancelled();
			case 4:
			return $this->orderBorrowing();
			case 5:
			return $this->orderHistory();
			default:
			abort(404);
		}
	}

	private function orderWait(){
		$order = Order::where('status','=',1)->where('users_id','=',\Auth::user()->id)->get();
		if(count($order) == 1){
			$result = Order::find($order[0]->id)->Book;
			return view('user.wait_order',['result' => 1,'order' => $order[0],'data' => $result]);
		}
		return view('user.wait_order',['result' => 0]);
	}

	private function orderConfirmed(){
		$order = Order::where('status','=',2)->where('users_id','=',\Auth::user()->id)->get();
		if(count($order) == 1){
			$result = Order::find($order[0]->id)->Book;
			return view('user.confirmed_order',['result' => 1,'order' => $order[0],'data' => $result]);
		}
		return view('user.confirmed_order',['result' => 0]);
	}

	private function orderBorrowing(){
		$order = Order::where('status','=',4)->where('users_id','=',\Auth::user()->id)->get();
		if(count($order) == 1){
			$result = Order::find($order[0]->id)->Book;
			return view('user.borrowing_order',['result' => 1,'order' => $order[0],'data' => $result]);
		}
		return view('user.borrowing_order',['result' => 0]);
	}

	private function orderCancelled(){
		$orders = Order::where('status','=',3)->get();
		return view('user.cancelled_order',['orders' => $orders]);
	}

	private function orderHistory(){
		$orders = Order::where('status','=',5)->get();
		return view('user.history_order',['orders' => $orders]);
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

	public function detail(request $request){
        $id = $request->id;
        if($order = Order::find($id)){
        	return response()->json($order); 
        }
        return false;
    }
}
