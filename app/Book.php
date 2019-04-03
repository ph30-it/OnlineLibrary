<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
use App\Order;

class Book extends Model
{
    protected $table = "books";

    protected $fillable = [
    	'name', 'img', 'author', 'published_year', 'describes', 'price', 'quantity', 'categories_id'
    ];

    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function Order(){
        return $this->belongstoMany(Order::class, 'detail_order', 'order_id', 'books_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class)->orderBy('created_at','DESC');
    }
}
