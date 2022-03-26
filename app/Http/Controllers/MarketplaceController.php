<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptsQuestion;
use Auth;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    private $view = "marketplace";
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth')->except('take_quiz', 'thank_you', 'quiz_attempts');
    }

    public function take_quiz(Request $request, $id)
    {
        $data = array();
        if ($request->isMethod('post')) {
            // dd($request->quiz_attempt_id);
            $check = QuizAttemptsQuestion::where('quiz_attampts_id', $request->quiz_attempt_id)->where('question_id', $request->question_id);
            if ($check->count() > 0) {
                $data_insert = [
                    'quiz_attampts_id' => $request->quiz_attempt_id,
                    'question_id' => $request->question_id,
                    'answer_id' => $request->ans_selected,
                ];
                $check->update($data_insert);
            } else {
                $object = new QuizAttemptsQuestion;
                $data_insert = [
                    'quiz_attampts_id' => $request->quiz_attempt_id,
                    'question_id' => $request->question_id,
                    'answer_id' => $request->ans_selected,
                    'created_by' => (Auth::check()) ? Auth::user()->id : null,
                ];
                $object->create($data_insert);
            }

            $quiz_attempt = QuizAttempt::find($id);
            $data['quiz'] = Quiz::with(['questions.answers', 'questions'])->where('id', $quiz_attempt->quiz_id)->get()->first()->toArray();
            $response = '';
            if (!empty($request->cat_id)) {
                $data['categories'] = Category::where('id', $request->cat_id)->get()->toArray();
            }

            $data['count'] = count($data['quiz']['questions']);
            $skip = (int) @$request->skip;
            $data['skip'] = $skip;

            $question['data'] = @$data['quiz']['questions'][$skip];
            echo json_encode(['question' => $question, 'count' => $data['count'], 'skip' => $data['skip']]);
            exit;
        }
        $quiz_attempt = QuizAttempt::find($id);
        $data['quiz_attempt_id'] = $quiz_attempt->id;
        // $data['parent_categories'] = Category::with('parent_category')->whereNull('parent_category_id')->get()->toArray();
        $data['categories'] = Category::all()->toArray();
        $data['parent_categories'] = Category::with('parent_category')->whereNull('parent_category_id')->get()->toArray();
        $data['quiz'] = Quiz::with('questions.answers')->where('id', $quiz_attempt->quiz_id)->get()->first()->toArray();

        return view('take_quiz', $data);
    }

    public function view_quiz($id)
    {

        $data = [];

        $data['quiz'] = Quiz::with('questions.answers')->where('id', $id)->get()->first()->toArray();
        // dd($data);
        return view('view_quiz', $data);
    }

    public function profile()
    {
        $data = [];
        return view('profile_page', $data);
    }

    public function thank_you($quizAttemptId)
    {
        if (!Auth::check()) {
            return $this->showFreeTestResult($quizAttemptId);
        }
        $data = [];
        $data['categories'] = Category::all()->toArray();
        $data['parent_categories'] = Category::with('parent_category')->whereNull('parent_category_id')->get()->toArray();

        return view('thank_you', $data);
    }
    public function generate_quiz_attempt(Request $request, $quiz_id)
    {
        $obj = new QuizAttempt;
        $data = [
            'quiz_id' => $quiz_id,
            'std_id' => Auth::user()->id,
        ];
        $created_data = $obj->create($data);
        return redirect(url('take_quiz/' . $created_data->id));
    }
    public function quiz_attempts()
    {
        $data = [];
        $data['attempts'] = QuizAttempt::with('quiz.questions.answers', 'attempt_question.answer')->where('std_id', Auth::user()->id)->get()->toArray();
        if (!empty($data['attempts'])) {

            foreach ($data['attempts'] as $k => $v) {
                $count_question = count($v['quiz']['questions']);
                $data['attempts'][$k]['total_questions'] = $count_question;
                $correct_counter = 0;
                foreach ($v['attempt_question'] as $key => $val) {
                    if ($val['answer']['is_correct'] == 1) {
                        $correct_counter++;
                    }
                }
                $data['attempts'][$k]['correct_questions'] = $correct_counter;
            }
        }
        // dd($data['attempts']);
        $data['categories'] = Category::all()->toArray();
        $data['parent_categories'] = Category::with('parent_category')->whereNull('parent_category_id')->get()->toArray();
        return view('quiz_attempts', $data);
    }
    public function checkout(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {

            $data = CartItem::with('quiz')->select('quiz_id')->get()->toArray();
            foreach ($data as $key => $value) {
                $data = ['status' => 'purchased'];
                $new_data = Quiz::find($value['quiz_id']);
                $new_data->update($data);
            }
            $response = array('flag' => true, 'msg' => 'Checkout completed sucessfully.', 'action' => 'reload');

            CartItem::where('user_id', Auth::user()->id)->delete();
            echo json_encode(['key' => 'val']);
            return;
        }
        $data = [];
        return view('checkout', $data);
    }
    public function add_to_cart(Request $request)
    {
        $data = [];
        // dd($request->all());
        if ($request->id) {
            $rows = Quiz::where('id', $request->id)->get()->first()->toArray();
            // dd($rows);
            $row = [
                'quiz_id' => $rows['id'],
                'price' => $rows['price'],
                'user_id' => Auth::user()->id,
            ];
            $object = new CartItem;
            $object_update = CartItem::where('quiz_id', $request->id);
            if (!empty($object_update->get()->toArray())) {
                $object_update->update($row);
            } else {
                $object->insert($row);
            }
            $response = array('flag' => true, 'msg' => 'Quiz is added to cart.', 'action' => 'reload', 'url' => url('/marketplace'));

            return redirect(url('/marketplace?add_to_cart=true'));
        }
        if (!empty($request->category)) {

            $object = new CartItem;
            $obj = Quiz::with(['order_items' => function ($query) {
                $query->where('user_id', Auth::user()->id);
            }])->where('price', '>', 0)->get();

            foreach ($obj as $key_quiz => $quiz) {

                if (count($quiz['order_items']) == 0) {
                    $row = [
                        'quiz_id' => $quiz['id'],
                        'price' => $quiz['price'],
                        'user_id' => Auth::user()->id,
                    ];
                    $object->insert($row);
                }
            }

            $response = array('flag' => true, 'msg' => 'Category is added to cart.', 'action' => 'reload', 'url' => url('/marketplace'));
            return redirect(url('/marketplace?add_to_cart=true'));
        }

        if (!empty($request->premium)) {
            if (Auth::user()->role == 4) {
                echo '<script>alert("Already a premium member.")</script>';
                $url = url("/marketplace");
                echo '<script>window.location.href ="' . $url . '"</script>';
            } else {
                $id = $request->premium;
                $object = new CartItem;
                $cart = $object->where('quiz_id', $id)->where('user_id', Auth::user()->id)->get();
                // dd($cart);
                if (count($cart) == 0) {

                    $obj = Quiz::where('type', 'premium')->get()->toArray();

                    foreach ($obj as $key => $val) {

                        $row = [
                            'quiz_id' => $val['id'],
                            'price' => $val['price'],
                            'user_id' => Auth::user()->id,
                        ];
                    }

                    $object->insert($row);
                    $response = array('flag' => true, 'msg' => 'Lifetime product is added to cart.', 'action' => 'reload', 'url' => url('/marketplace'));
                    return redirect(url('/marketplace?add_to_cart=true'));
                } else {
                    echo '<script>alert("Already in cart.")</script>';
                    $url = url("/marketplace");
                    echo '<script>window.location.href ="' . $url . '"</script>';
                }
            }
        }
    }
    public function showFreeTestResult($quizAttemptId)
    {
        $data = [];
        $data['attempts'] = QuizAttempt::with('quiz.questions.answers', 'attempt_question.answer')->where('id', $quizAttemptId)->get()->toArray();
        if (!empty($data['attempts'])) {

            foreach ($data['attempts'] as $k => $v) {
                $count_question = count($v['quiz']['questions']);
                $data['attempts'][$k]['total_questions'] = $count_question;
                $correct_counter = 0;
                foreach ($v['attempt_question'] as $key => $val) {
                    if ($val['answer']['is_correct'] == 1) {
                        $correct_counter++;
                    }
                }
                $data['attempts'][$k]['correct_questions'] = $correct_counter;
            }
        }
        // dd($data['attempts']);
        $data['categories'] = Category::all()->toArray();
        $data['parent_categories'] = Category::with('parent_category')->whereNull('parent_category_id')->get()->toArray();
        return view('quiz_attempts', $data);
    }
}
