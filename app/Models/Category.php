<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
    protected $guarded = [];

    public function parent_category(){
		return $this->hasMany('App\Models\Category','parent_category_id');
    }
    public function parent_category_child(){
		return $this->belongsTo('App\Models\Category', 'parent_category_id', 'id');
    }
}

