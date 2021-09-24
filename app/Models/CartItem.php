<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CartItem extends Model
{
    use SoftDeletes;
    protected $table = 'cart_items';
    protected $guarded = [];

    public function quiz()
    {
    	return $this->belongsTo('App\Models\Quiz', 'quiz_id', 'id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
