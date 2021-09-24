<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class QuizAttemptsQuestion extends Model
{
    use SoftDeletes;
    protected $table = 'quiz_attempts_questions';
    protected $guarded = [];

    public function answer()
    {
    	return $this->belongsTo('App\Models\Answer', 'answer_id', 'id');
    }
    
}
