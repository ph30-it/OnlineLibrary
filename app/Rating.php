<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";

    protected $fillable = [
    	'users_id','books_id','star_number'
    ];
}
