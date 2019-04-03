<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Rating extends Model
{
    protected $table = "ratings";

    protected $fillable = [
    	'user_id', 'book_id', 'star_number', 'comment'
    ];

	public function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
