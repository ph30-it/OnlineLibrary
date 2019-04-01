<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";

    protected $fillable = [
    	'user_id','book_id','star_number'
    ];
}
