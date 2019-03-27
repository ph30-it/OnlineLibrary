<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = [
    	'comment', 'users_id', 'books_id'
    ];

    public function User(){
        return $this->belongsTo('App\User', 'users_id', 'id');
    }

    public function Book(){
        return $this->belongsTo('App\Book', 'books_id', 'id');
    }
}
