<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(){
    	$order = Order::all();
    	return view('admin.orders.index', compact('order'));
    }

    public function ViewDetail(request $request){
        $id = $request->orderid;
        if($order = Order::find($id)){

            $html = '<div class="row">
             <div class="col-lg-12">
             <p>Tên thành viên: '.$order->user->firstname.' '.$order->user->lastname.'</p>
             <p>Số điện thoại: '.$order->user->phone.'</p>
             <p>Đặt ngày: '.$order->created_at.'</p>
             <table class="table table-striped table-bordered table-hover">
             <thead>
             <tr>
             <th>Tên sách</th>
             <th>Số lượng</th>
             <th>Giá tiền</th>
             </tr>
             </thead>
             <tbody>';
             foreach ($order->Book as $row) {
                $html .= '<tr>
                <td>'.$row->name.'</td>
                <td>'.$row->quantity.'</td>
                <td>'.$row->price.'</td>
                </tr>';
             }
             $html .= '</tbody>
             </table>
             </div>
             </div>';
             return $html;
        }
    }

    public function updateStatus(request $request){
    	$data = $request->only('id', 'status');
    	if($order = Order::find($data['id'])){
            if($data['status'] == 4){
                $data['date_borrow'] = date("Y-m-d h:i:s");
            }
    		if($data['status'] >= 5){
    			$data['date_give_back'] = date("Y-m-d h:i:s");
    		}
    		$order->update($data);
    	}
    	return redirect()->back();
    }
}
