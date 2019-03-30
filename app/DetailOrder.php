<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_order';

    protected $fillable = [
    	'order_id', 'books_id', 'quantity', 'created_at', 'updated_at'
    ];

    public function order(){
    	return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function book(){
    	return $this->belongsTo('App\Book', 'books_id', 'id');
    }
}
