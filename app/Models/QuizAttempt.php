<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class QuizAttempt extends Model
{
    use SoftDeletes;
    protected $table = 'quiz_attempts';
    protected $guarded = [];

    public function quiz()
    {
    	return $this->belongsTo('App\Models\Quiz', 'quiz_id', 'id');
    }
    public function attempt_question()
    {
    	return $this->hasMany('App\Models\QuizAttemptsQuestion', 'quiz_attampts_id');
    }
}
