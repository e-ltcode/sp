<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CourseFeedback extends Model
{
    use SoftDeletes;
    protected $table = 'course_feedback';
    protected $guarded = [];
}
