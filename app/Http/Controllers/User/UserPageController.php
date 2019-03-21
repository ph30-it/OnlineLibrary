<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\OrderDetail;

class UserPageController extends Controller
{
    public function ShowUserPage(){
    	return \View::make('User.user_page');
    }

    public function LoadSubPage($section_id = 0){
    	if($section_id == 1){
    		$user_id = Auth::user()->id;

    		$ordered_books = Order::where('users_id','=',$user_id)->where('status','=',0)->get();
    		$approval_books = Order::where('users_id','=',$user_id)->where('status','=',1)->get();
    		$approved_books = Order::where('users_id','=',$user_id)->where('status','=',2)->get();
    		$denied_books = Order::where('users_id','=',$user_id)->where('status','=',3)->get();

    		$ordered_detail = array();
    		$approval_detail = array();
    		$approved_detail = array();
    		$denied_detail = array();

    		foreach($ordered_books as $order){
    			$detail = OrderDetail::where('order_id','=',$order->id)->get();
    			array_push($ordered_detail, $detail[0]);
    		}

    		foreach($approval_books as $order){
    			$detail = OrderDetail::where('order_id','=',$order->id)->get();
    			array_push($approval_detail, $detail[0]);
    		}

    		foreach($approved_books as $order){
    			$detail = OrderDetail::where('order_id','=',$order->id)->get();
    			array_push($approved_detail, $detail[0]);
    		}

    		foreach($denied_books as $order){
    			$detail = OrderDetail::where('order_id','=',$order->id)->get();
    			array_push($denied_detail, $detail[0]);
    		}
    		return \View::make('User.SubView.cart_page')->with('data',['ordered_data' => $ordered_detail,'approval_data' => $approval_detail,'approved_data' => $approved_detail,'denied_data' => $denied_detail]);
    	}
    	return \View::make('User.SubView.user_profile');
    }

    public function ConfirmOrderedBooks(){
    	$user_id = Auth::user()->id;
    	$ordered_books = Order::where('users_id','=',$user_id)->where('status','=',0)->get();

    	foreach ($ordered_books as $order) {
    		$order->status = 1;
    		$order->save();
    	}
    }

    public function RemoveOrderedBook($order_id){

    	$detail = OrderDetail::where('order_id','=',$order_id)->get();
    	$detail[0]->delete();
    	Order::destroy($order_id);
    }

    public function UpdateProfile(Request $request){
    	
    }

}
