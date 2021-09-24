<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Quiz extends Model
{
    use SoftDeletes;
    protected $table = 'quizes';
    protected $guarded = [];
    
    public function questions(){
    	return $this->hasMany('App\Models\Question','quiz_id');
    }
    public function order_items(){
    	return $this->hasMany('App\Models\OrderItem','quiz_id');
    }
    public function quiz_attempts(){
    	return $this->hasMany('App\Models\QuizAttempt','quiz_id');
    }
   
}
