<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\CartItem;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptsQuestion;
use Auth;

class HomeController extends Controller
{
    private $view     =  "marketplace";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request,$check=null)
    {



        if(Auth::check()){

            $obj = Quiz::with(['order_items'=>function($query){
                $query->where('created_by',Auth::user()->id);
            }])->withCount('questions')->withCount('quiz_attempts');
            $paid_obj = Quiz::with(['order_items'=>function($query){
                $query->where('created_by',Auth::user()->id);
            }])->withCount('questions')->withCount('quiz_attempts');
            $free_obj = Quiz::with(['order_items'=>function($query){
                $query->where('created_by',Auth::user()->id);
            }])->withCount('questions')->withCount('quiz_attempts');

        }else{
            $obj = Quiz::with('order_items')->withCount('questions');
            $paid_obj = Quiz::with('order_items')->withCount('questions');
            $free_obj = Quiz::with('order_items')->withCount('questions');
        }


        if(!empty($request->search)){

            $obj = $obj->where('quiz_title','like',$request->search.'%');
            $paid_obj = $paid_obj->where('quiz_title','like',$request->search.'%');
            $free_obj = $free_obj->where('quiz_title','like',$request->search.'%');

        }


        $data['quizes'] = $obj->get();
        
        $paid_obj = $paid_obj->where('price','>', '0');
        $free_obj = $free_obj->where('price', '0');
        $data['paid_quizes'] = $paid_obj->get();
        
        
        $data['free_quizes'] = $free_obj->get();
        
        // dd($data['quizes']->toArray());
        return view('home',$data);
    }


    public function home(Request $request,$check=null)
    {
        $data = [];
        return view('home_page',$data);
    }


    

}
