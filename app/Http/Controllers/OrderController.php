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
			case 5:
			return $this->orderHistory();
			case 4:
			return $this->orderBorrowing();
			default:
			abort(404);
		}
	}

	private function orderWait(){
		$order = Order::where('status','=',1)->where('user_id','=',\Auth::user()->id)->first();
		if($order !== null){
			$result = Order::find($order->id)->orderdetail;
			return view('user.wait_order',['result' => 1,'order' => $order,'data' => $result]);
		}
		return view('user.wait_order',['result' => 0]);
	}

	private function orderConfirmed(){
		$order = Order::where('status','=',2)->where('user_id','=',\Auth::user()->id)->first();
		if($order !== null){
			$result = Order::find($order->id)->orderdetail;
			return view('user.confirmed_order',['result' => 1,'order' => $order,'data' => $result]);
		}
		return view('user.confirmed_order',['result' => 0]);
	}

	private function orderBorrowing(){
		$order = Order::where('status','=',4)->where('user_id','=',\Auth::user()->id)->first();
		if($order !== null){
			$result = Order::find($order->id)->orderdetail;
			return view('user.borrowing_order',['result' => 1,'order' => $order,'data' => $result]);
		}
		return view('user.borrowing_order',['result' => 0]);
	}

	private function orderHistory(){
		$orders = Order::wherein('status', [3,4,5])->orderBy('updated_at','DESC')->get();
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
