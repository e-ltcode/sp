<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\CartItem;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptsQuestion;
use App\Models\Category;
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
        // dd(Auth::user()->order_items);
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
            $obj = Quiz::withCount('questions');
            $paid_obj = Quiz::withCount('questions');
            $free_obj = Quiz::withCount('questions');
        }

        $data['type'] = @$request->type;

        if(!empty($request->search)){

            $obj = $obj->where('quiz_title','like',$request->search.'%');
            $paid_obj = $paid_obj->where('quiz_title','like',$request->search.'%');
            $free_obj = $free_obj->where('quiz_title','like',$request->search.'%');

        }
        // dd($request->cat_id);
        if(!empty(@$request->cat_id)){
            $data['paid_quizes'] = $paid_obj->where('id',$request->cat_id)->get();
            $data['free_quizes'] = $free_obj->where('id',$request->cat_id)->get();
            $data['quizes'] = $obj->where('id',$request->cat_id)->get();
        }
        $data['quizes'] = $obj->get();

        $paid_obj = $paid_obj->where('price','>', '0');
        $free_obj = $free_obj->where('price', '0');
        $data['paid_quizes'] = $paid_obj->get();
        $data['categories'] = Category::with('parent_category')->get()->toArray();
        $data['parent_categories'] = Category::with('parent_category')->whereNull('parent_category_id')->get()->toArray();
        
        
        $data['free_quizes'] = $free_obj->get();
        // dd($data);
        
        return view('home',$data);
    }



    public function test_marketplace(Request $request,$check=null)
    {
        // dd(Auth::user()->order_items);
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
            $obj = Quiz::withCount('questions');
            $paid_obj = Quiz::withCount('questions');
            $free_obj = Quiz::withCount('questions');
        }

        $data['type'] = @$request->type;

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
        // dd($data);
        
        return view('marketplace_test',$data);
    }


    public function home(Request $request,$check=null)
    {
        $data = [];
        return view('home_page',$data);
    }
    public function privacy(){
        $data = [];
        return view('privacy_policy',$data);
    }
    public function terms(){
        $data = [];
        return view('terms_condition',$data);
    }


    

}
