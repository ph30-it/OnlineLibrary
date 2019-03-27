<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
    	'users_id', 'status', 'price', 'note', 'date_borrow', 'date_give_back'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'users_id', 'id');
    }

    public function book(){
        return $this->belongstoMany('App\Book', 'detail_order', 'order_id', 'books_id');
    }
    
}
