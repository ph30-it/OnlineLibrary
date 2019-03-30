<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Book;

class OrderController extends Controller
{
    public function index($status){
        $status = ($status < 1 || $status > 5) ? 1 : $status;
    	$orders = Order::where('status', '=', $status)->orderBy('status', 'ASC')->paginate(50);
        $dayBefore = (new \DateTime(date('Y-m-d h:i:s')))->modify('-1 day')->format('Y-m-d h:i:s');
        $orders_expired = Order::where('status', 2)->where('updated_at', '<', $dayBefore)->get();
    	return view('admin.orders.index', compact('orders', 'status', 'orders_expired'));
    }

    public function show(request $request){
        if($order = Order::find($request->id)){
            return response()->json([
                'readers' => $order->user->firstname.' '.$order->user->lastname,
                'contact' => $order->user->phone,
                'created_time' => date($order->created_at),
                'total' => number_format($order->price),
                'count' => $order->detailorder->count(),
                'status' => $order->status,
                'date_borrow' => $order->date_borrow,
                'date_give_back' => $order->date_give_back,
                'book' => $order->detailorder->map(function($item){
                    $data = [
                        'name' => $item->book->name,
                        'quantity' => $item->quantity,
                        'bquantity' => $item->book->quantity,
                        'price' => number_format($item->book->price),
                        'total' => number_format($item->book->price*$item->quantity)
                    ];
                    return $data;
                })
            ]);
        }
    }

    public function update(request $request){
    	$data = $request->only('id', 'status');
    	if($order = Order::find($data['id'])){
            switch ($data['status']) {
                case 2:
                    $order->detailorder->map(function($item){ // ẩn đi số lượng sách được phép thuê
                        $book = Book::find($item->book->id);
                        $book->quantity -= $item->quantity;
                        return $book->save();
                    });
                    break;
                case 3:
                    if($order->status == 2){ // nếu đang chờ lấy nhưng bị hủy sẽ trã số lượng sách bị ẩn lại
                        $order->detailorder->map(function($item){
                            $book = Book::find($item->book->id);
                            $book->quantity += $item->quantity;
                            return $book->save();
                        });
                    }
                    break;
                case 4:
                    $data['date_borrow'] = date("Y-m-d h:i:s");
                    break;
                case 5:
                    $order->detailorder->map(function($item){ // trã lại số sách bị ẩn
                        $book = Book::find($item->book->id);
                        $book->quantity += $item->quantity;
                        return $book->save();
                    });
                    $data['date_give_back'] = date("Y-m-d h:i:s");
                    break;
            }
            if($order->update($data)){
                return response()->json(['error' => 0, 'message' => '']);
            }

    	}
    	return response()->json(['error' => 1, 'message' => 'Không tìm thấy đơn hàng']);
    }

    public function destroy(request $request){
        $data = $request->only('id');
        if($order = Order::find($data['id'])){
            if($order->delete()){
                return response()->json(['error' => 0, 'message' => '']);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Không tìm thấy đơn hàng']);
    }

    public function search(request $request){
        $orders = Order::whereHas('user', function ($query) use ($request){
            return $query->WhereRaw("concat(firstname, ' ', lastname) like '%$request->key%' ");
        })->Where('status', '!=', 3)->orWhere('id', 'like', "%$request->key%")->Where('status', '!=', 3)->orderBy('status', 'ASC')->paginate(50);
        return view('admin.orders.index', compact('orders'));
    }
}
