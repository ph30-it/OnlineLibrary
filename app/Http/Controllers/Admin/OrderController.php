<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::where('status', '!=', 3)->orderBy('status', 'ASC')->paginate(50);
    	return view('admin.orders.index', compact('orders'));
    }

    public function ViewDetail(request $request){
        $id = $request->orderid;
        if($order = Order::find($id)){
            return response()->json([
                'readers' => $order->user->firstname.' '.$order->user->lastname,
                'created_time' => date($order->created_at),
                'count' => $order->book->count(),
                'status' => $order->status,
                'book' => $order->book
            ],200);
        }
    }

    public function update(request $request){
    	$data = $request->only('id', 'status');
    	if($order = Order::find($data['id'])){
            if($data['status'] == 4){
                $data['date_borrow'] = date("Y-m-d h:i:s");
            }
            else if($data['status'] > 4){
    			$data['date_give_back'] = date("Y-m-d h:i:s");
    		}
            if($order->update($data)){
                return response()->json(['error' => 0], 200);
            }
    	}
    	return response()->json(['error' => 1], 200);
    }

    public function search(request $request){
        $orders = Order::whereHas('user', function ($query) use ($request){
            return $query->WhereRaw("concat(firstname, ' ', lastname) like '%$request->key%' ");
        })->Where('status', '!=', 3)->orWhere('id', 'like', "%$request->key%")->Where('status', '!=', 3)->orderBy('status', 'ASC')->paginate(50);
        return view('admin.orders.index', compact('orders'));
    }
}
