<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LessonComment extends Model
{
    use SoftDeletes;
    protected $table = 'lesson_comments';
    protected $guarded = [];
}
