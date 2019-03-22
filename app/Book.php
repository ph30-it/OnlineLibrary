<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
    	'name', 'img', 'author', 'published_year', 'describes', 'price', 'quantity', 'categories_id'
    ];

    public function category(){
    	return $this->belongsTo(Category::class,'categories_id');
    }

    public function order(){
        return $this->belongstoMany('App\Order', 'detail_order', 'order_id', 'books_id');
    }
}
