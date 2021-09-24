<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Auth;

class AnswersController extends Controller
{
	private $type = 'answers';
	private $singular = 'Answer';
	private $plural = 'Answers';
	private $view = 'admin.answers.';
	private $action = '/admin/answers';
	private $db_key   =  "id";
	private $perpage = 100000;
	private $user = [];
    function set_action(){
        if(Auth::user()->role == 2){
            $this->action = '/instructor/'.$this->type;
        }
    }
	function index(Request $request,$id=null){
        $this->set_action();
		$data = array();
		$data   = array(
            "page_title"=>$this->plural." List",
            "page_heading"=>$this->plural.' List',
            "breadcrumbs"=>array("#"=>$this->plural." List")
        );
        if($request->perpage)
            $this->perpage = $request->perpage;
        $obj  = new Answer;
        if(Auth::user()->role == 2){
            $obj = $obj->where('created_by',Auth::user()->id);
        }
        if(@$id){
            $obj = $obj->where('question_id',$id);
            $data['selected_question'] = @$id;
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
            $Obj         = new Answer;
            $data['created_by'] = Auth::id();
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
        $data['selected_question'] = @$id;
        $data['questions'] = Question::all()->toArray();
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

            $Obj         = Answer::find($id);
            if (empty(@$data['is_correct'])) {
                $data['is_correct'] = 0;
            }
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
        $data['questions'] = Question::all();

        $data['row'] = Answer::find($id)->toArray();

        return view($this->view.'create_edit',$data);
    }
    public function delete($id) {
        Answer::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
}


