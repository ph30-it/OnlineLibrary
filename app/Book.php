<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";

    protected $fillable = [
    	'name', 'img', 'author', 'published_year', 'describes', 'price', 'quantity', 'categories_id'
    ];

    public function categories(){
        return $this->belongsTo('App\Categories');
    }

    public function Order(){
        return $this->belongstoMany('App\Order', 'detail_order', 'order_id', 'books_id');
    }
}
