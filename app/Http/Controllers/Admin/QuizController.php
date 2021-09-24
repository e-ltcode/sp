<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Category;
use Auth;
use App\Exports\QuizExport;
use App\Imports\QuizImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class QuizController extends Controller
{
    private $type     =  "quizes";
    private $singular =  "Quiz";
    private $plural   =  "Quiz";
    private $view     =  "admin.quizzes.";
    private $action   =  "/admin/quizes";
    private $db_key   =  "id";
    private $directory = "quiz_images";
    private $csv_directory = "quiz_csv";
    private $user = [];
    private $perpage = 1000;

    function set_action(){
        if(Auth::user()->role == 2){
            $this->action = '/instructor/'.$this->type;
        }
    }

    function index(Request $request){
        $this->set_action();
        $data   = array();
        $data   = array(
            "page_title"=>$this->plural." List",
            "page_heading"=>$this->plural.' List',
            "breadcrumbs"=>array("#"=>$this->plural." List")
        );
        if($request->perpage)
            $this->perpage = $request->perpage;
        
        $obj  = new Quiz;
        if(Auth::user()->role == 2){
            $obj = $obj->where('created_by',Auth::user()->id);
        }
        if(@$request->course){
            $course_id = $request->course;
            $obj = $obj->whereHas('topic',function($query) use($course_id){
                return $query->where('course_id',$course_id);
            });
        }
        if(@$request->topic){
            $obj = $obj->where('topic_id',$request->topic);
            $data['selected_quiz'] = @$request->topic;
        }
        $data['list']   =   $obj->paginate($this->perpage)->toArray();
        $data['module'] = [
            'type'=>$this->type,
            'singular'=>$this->singular,
            'plural'=>$this->plural,
            'view'=>$this->view,
            'action'=>$this->action,
            'db_key' => $this->db_key
        ];

        return view($this->view.'list',$data);

    }
    public function create(Request $request,$id=null)
    {
        $this->set_action();
        if($request->isMethod('post')){
            $data = $request->all();
            $this->cleanData($data);
            $data['created_by'] = Auth::user()->id;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = Storage::putFile($this->directory, $file);
                $data['image'] = $filename;
            }

            $Obj         = new Quiz;
            $Obj->insert($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $data   = array();
        $data   = array(
            "page_title"=>"Add ".$this->singular,
            "page_heading"=>"Add ".$this->singular,
            "button_text"=>"Add ".$this->singular,
            "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
            "action"=> url($this->action.'/create')
        );
        $data['selected_quiz'] = @$id;
        $data['categories'] = Category::all();
        return view($this->view.'create_edit',$data);
    }
    public function cleanData(&$data) {
        $unset = ['ConfirmPassword','q','_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }

    }
    
    public function edit(Request $request,$id = NULL)
    {
        $this->set_action();
        if($request->isMethod('post')){
            $data = $request->all();
            $this->cleanData($data);   
            
            $Obj         = Quiz::find($id);
            $Obj->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $id = $request->param;
        $data   = array();
        $data   = array(
            "page_title"=>"Edit ".$this->singular,
            "page_heading"=>"Edit ".$this->singular,
            "button_text"=>"Update ",
            "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
            "action"=> url($this->action.'/edit/'.$id)
        );

        $data['row'] = Quiz::find($id)->toArray();

        return view($this->view.'create_edit',$data);
    }
    private function csvToArray($path)
    {
        try{
            $csv = fopen($path, 'r');
            $rows = [];
            $header = [];
            $index = 0;
            while (($line = fgetcsv($csv)) !== FALSE) {
                if ($index == 0) {
                    $header = $line;
                    $index = 1;
                } else {
                    $row = [];
                    for ($i = 0; $i < count($header); $i++) {
                        $row[$header[$i]] = $line[$i];
                    }
                    array_push($rows, $row);
                }
            }
            return $rows;
        }catch (Exception $exception){
            return false;
        }
    }
    public function import(Request $request,$id = NULL)
    {
        $quiz_id = $request->param;
        if($request->isMethod('post')){
            if ($request->hasFile('import_csv')) {
                $file = $request->file('import_csv');
                $filename = Storage::putFile($this->csv_directory, $file);
                $data['import_csv'] = $filename;
                $arr = $this->csvToArray(url('storage/app/public/'.$filename));

                foreach($arr as $key => $val){

                    $question =  new Question;
                    $data_question = [
                        'title' => $val['question'],
                        'type' => 'mcqs',
                        'quiz_id' => $request->quiz_id,
                        'created_by' => Auth::user()->id
                    ];
                    $new_question = $question->create($data_question);

                    $answer = new Answer;

                    $data_answer = [
                        [
                            'title' => $val['answer1'],
                            'is_correct' => ($val['correct'] == 1)?true:false,
                            'question_id' => $new_question->id,
                            'created_by' => Auth::user()->id
                        ],
                        [
                            'title' => $val['answer2'],
                            'is_correct' => ($val['correct'] == 2)?true:false,
                            'question_id' => $new_question->id,
                            'created_by' => Auth::user()->id
                        ],
                        [
                            'title' => $val['answer3'],
                            'is_correct' => ($val['correct'] == 3)?true:false,
                            'question_id' => $new_question->id,
                            'created_by' => Auth::user()->id
                        ],
                        [
                            'title' => $val['answer4'],
                            'is_correct' => ($val['correct'] == 4)?true:false,
                            'question_id' => $new_question->id,
                            'created_by' => Auth::user()->id
                        ],
                    ];

                    $answer->insert($data_answer);



                    $response = array('flag'=>true,'msg'=> 'Questions and Answer imported sucessfully.','action'=>'reload');
                    echo json_encode($response); return;

                }

            }

        }
        $data = [];
        $data = [
            "page_title"=>"Edit ".$this->singular,
            "page_heading"=>"Edit ".$this->singular,
            "button_text"=>"Update ",
            "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
            "action"=> url($this->action.'/import/'.$id)
        ];
        $data['quiz_id'] = $quiz_id;
        return view($this->view.'import',$data);
    }
    public function delete($id) {
        Quiz::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }


    


}
