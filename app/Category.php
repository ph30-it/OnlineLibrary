<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";

    protected $fillable = [
    	'name',
    ];

    public function Books(){
    	return $this->hasMany('App\Book', 'categories_id', 'id');
    }
}