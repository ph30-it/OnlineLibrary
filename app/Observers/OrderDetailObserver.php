<?php

namespace App\Observers;
use App\OrderDetail;
use App\Order;

class OrderDetailObserver
{
    public function created(OrderDetail $Detail)
    {
    	$Order = Order::find($Detail->order_id);
    	$Order->price += $Detail->book->price * $Detail->quantity;
    	$Order->save();
    }
}
