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
    
    public function orderdetail(){
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }
}
