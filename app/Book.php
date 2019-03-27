<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = "books";

    protected $fillable = [
    	'name', 'img', 'author', 'published_year', 'describes', 'price', 'quantity', 'categories_id'
    ];

    public function Category(){
        return $this->belongsTo('App\Category', 'categories_id', 'id');
    }

    public function Order(){
        return $this->belongstoMany('App\Order', 'detail_order', 'order_id', 'books_id');
    }

    public function Comment(){
        return $this->hasMany('App\Comment', 'books_id', 'id');
    }
}
