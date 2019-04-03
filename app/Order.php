<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Book;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
    	'users_id', 'status', 'price', 'note', 'date_borrow', 'date_give_back'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function Book(){
        return $this->belongstoMany(Book::class, 'detail_order', 'order_id', 'books_id');
    }
    
}
