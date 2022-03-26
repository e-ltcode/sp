<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\Category;
use App\Models\QuizAttempt;

class FreeTestController extends Controller
{
    public function generate_quiz_attempt(Request $request, $quiz_id)
    {
        $obj = new QuizAttempt;
        $data = [
            'quiz_id' => $quiz_id,
        ];
        $created_data = $obj->create($data);
        return redirect(url('take_quiz/' . $created_data->id));
    }
}
