<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Book extends Model
{
    protected $table = 'books';

    public function category(){
    	return $this->belongsTo(Category::class,'categories_id');
    }
}
