<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Book;

class OrderDetail extends Model
{
    protected $table = 'detail_order';

    public function order(){
    	return $this->belongsTo(Order::class,'order_id');
    }

    public function book(){
    	return $this->belongsTo(Book::class,'books_id');
    }
}
