<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Topic;
use Auth;
class QuestionsController extends Controller
{
    private $type     =  "questions";
    private $singular =  "Question";
    private $plural   =  "Questions";
    private $view     =  "admin.question.";
    private $action   =  "/admin/questions";
    private $db_key   =  "id";
    private $user = [];
    private $perpage = 10000;
    function set_action(){
        if(Auth::user()->role == 2){
            $this->action = '/instructor/'.$this->type;
        }
    }

    function index(Request $request,$id=null){
        $this->set_action();
        $data   = array();
        $data   = array(
            "page_title"=>$this->plural." List",
            "page_heading"=>$this->plural.' List',
            "breadcrumbs"=>array("#"=>$this->plural." List")
        );
        if($request->perpage)
            $this->perpage = $request->perpage;
        $obj  = new Question;
        if(Auth::user()->role == 2){
            $obj = $obj->where('created_by',Auth::user()->id);
        }
        if(@$id){
            $obj = $obj->where('quiz_id',$id);
            $data['selected_quiz'] = @$id;
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
            $data['created_by'] = Auth::user()->id;
            $this->cleanData($data);
            $answers = $data['answers'];
            $correct = $data['is_correct'];
            unset($data['answers'],$data['is_correct']);
            $Obj         = new Question;
            $new_question = $Obj->create($data);
            foreach($answers as $k => $single_answer){
                $temp = [
                    'title' => $single_answer,
                    'is_correct' => ($correct == $k) ? true : false,
                    'question_id' => $new_question->id,
                    'created_by' => Auth::user()->id
                ];
                $answer_obj = new Answer;
                $answer_obj->create($temp);
            }

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
        $data['quiz'] = Quiz::all();
        $data['selected_quiz'] = @$id;
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
            
            $answers = $data['answers'];
            $correct = $data['is_correct'];
            unset($data['answers'],$data['is_correct']);

            $Obj         = Question::find($id);
            $Obj->update($data);
            foreach($answers as $k => $single_answer){
                $temp = [
                    'title' => $single_answer,
                    'is_correct' => ($correct == $k) ? true : false,
                    'question_id' => $id,
                    'created_by' => Auth::user()->id
                ];
                $answer_obj = Answer::find($k);
                $answer_obj->update($temp);
            }           


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
        $data['quiz'] = Quiz::all();

        $data['row'] = Question::with('answers')->find($id)->toArray();
        // dd($data['row']);
        return view($this->view.'create_edit',$data);
    }
    public function delete($id) {
        Question::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
}
