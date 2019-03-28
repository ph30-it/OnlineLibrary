<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Order;
use Illuminate\Support\Facades\DB;

class cartcontroller extends controller
{
	public function cart(){
		return view('cart');
	}

	public function addtocart($book_id){
		$book = book::find($book_id);
		if(!$book){
			return -1;
		}
		$cart = session()->get('cart');
		if(isset($cart[$book_id])) return -2;
		if (is_array($cart) && count($cart) == 5) {
			return -3;
		}
    	//check if cart is empty
		if(!$cart){
			$cart = [
				$book_id => [
					"name" => $book->name,
					"price" => $book->price,
					"photo" => $book->img,
					"id" => $book_id,
					"category" => $book->categories->name,
					"des" => $book->describes
				]
			];
		}else{
			$cart[$book_id] = [
				"name" => $book->name,
				"price" => $book->price,
				"photo" => $book->img,
				"id" => $book_id,
				"category" => $book->categories->name,
				"des" => $book->describes
			];
		}
		session()->put("cart",$cart);
		return 1;
	}

	function remove(request $request){
		if($request->id){
			$cart = session()->get('cart');
			if(isset($cart[$request->id])){
				unset($cart[$request->id]);
				session()->put('cart',$cart);
				return redirect()->back()->with(['class' => 'success', 'message' => 'delete success.']);
			}else{
				return redirect()->back()->with(['class' => 'danger', 'message' => 'something wrong.']);
			}	
		}
		return redirect()->back()->with(['class' => 'danger', 'message' => 'something wrong.']);
	}

	function submit_cart(){
		$cart = session()->get('cart');
		if(!$cart) return redirect()->back()->with(['class' => 'danger', 'message' => 'something wrong.']);
		//Dang muon sach theo mot don hang khac
		$ordering = Order::where('users_id','=',\Auth::user()->id)->wherein('status', [1,2,4])->get();
		if (count($ordering) >= 1) {
			switch ($ordering[0]->status) {
				case 1:
				$message = "You are watting admin submit orther cart !";
				break;
				case 2:
				$message = "You are have orther cart, please go to library to receive book !";
				break;
				case 3:
				$message = "You are borrowing books, go to library give book back to order orther cart";
				break;
				default:
				$message = "Something when wrong ,contact admin to support !";
				break;
			}
			return redirect()->back()->with(['class' => 'warning', 'message' => $message]);
		}

		DB::beginTransaction();
		try {
            $order = DB::table('Order')->insertGetId(['status' => 1,'price' => '0','users_id' => \Auth::user()->id,'created_at' => now(),'updated_at' => now()]);
			foreach($cart as $c){
				DB::table('Detail_Order')->insert(['order_id' => $order,'books_id' => $c["id"],'created_at' => now(),'updated_at' => now()]);
				DB::table('Order')->increment('price' ,$c['price']);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollBack();
			throw new Exception($e->getMessage());
		}
		session()->forget('cart');
		return redirect()->back()->with(['class' => 'success', 'message' => 'Your cart is submited, wait for admin check and go to library to get book !']);
	}
}
