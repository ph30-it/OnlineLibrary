<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\OrderDetail;
use App\Book;

class PaymentController extends Controller
{
    public function GetBookWithAuth($book_id){
    	if(!Auth::check()){
    		return $this->OrderError("You must log in to continue the order");
    	}

    	$orderedBooks = OrderDetail::where('books_id','=',$book_id)->get();

    	if(sizeof($orderedBooks) > 0){
    		foreach($orderedBooks as $orderBook){
    			if($orderBook->order->user->id == Auth::user()->id){
    				return $this->OrderError("You have ordered this book before. Please check your cart !");
    			}
    		}
    	}

    	$book = Book::find($book_id);

    	if($book == null){
    		return $this->OrderError("This book is no longer exist");
    	}

    	if($book->quantity == 0){
    		return $this->OrderError("No book to order");
    	}

    	$book->quantity -= 1;
    	$book->save();

    	$newOrder = new Order;

    	$newOrder->users_id = Auth::user()->id;
    	$newOrder->status = 0; // by default
    	$newOrder->price = $book->price;
  		$newOrder->save();

  		$detailOrder = new OrderDetail;

  		$detailOrder->order_id = $newOrder->id;
  		$detailOrder->books_id = $book->id;
  		$detailOrder->quantity = $book->quantity;
  		$detailOrder->save();

  		$data = new \stdClass;
  		$data->quantity = $book->quantity;

  		return json_encode($data);
    }

    private function OrderError($message){
    	$data = new \stdClass;
    	$data->error = true;
    	$data->errMessage = $message;
    	return json_encode($data);
    }
}
