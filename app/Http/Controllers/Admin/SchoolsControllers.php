<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Organization;
use App\Models\School;

class SchoolsControllers extends Controller
{
    private $type     =  "schools";
	private $singular =  "School";
	private $plural   =  "Schools";
	private $view     =  "admin.schools.";
	private $action   =  "/admin/schools";
	private $db_key   =  "id";
	private $user = [];
	private $perpage = 10;

	function index(Request $request){

		$data   = array();
		$data   = array(
			"page_title"=>$this->plural." List",
			"page_heading"=>$this->plural.' List',
			"breadcrumbs"=>array("#"=>$this->plural." List")
		);
		if($request->perpage)
			$this->perpage = $request->perpage;
		$schools = new School;
		$data['list'] = $schools->with('countries','organizations')->get()->toArray();
		// $data['list']   =   School::paginate($this->perpage)->toArray();
		$data['module'] = [
			'type'=>$this->type,
			'singular'=>$this->singular,
			'plural'=>$this->plural,
			'view'=>$this->view,
			'action'=>$this->action,
			'db_key' => $this->db_key
		];
        ///dd($data);

		return view($this->view.'list',$data);

    	// return view('admin/course_lang/list');
	}
	public function create(Request $request)
	{
		if($request->isMethod('post')){
			$data = $request->all();
			$this->cleanData($data);
            // Utility::appendRole($data);
			
			$Obj         = new School;
			$Obj->insert($data);
			$response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
			echo json_encode($response); return;
		}
		$data   = array();
		$data   = array(
			"page_title"=>"Add ".$this->singular,
			"countries" => Country::all()->toArray(),
			"Organization" => Organization::all()->toArray(),
			"page_heading"=>"Add ".$this->singular,
			"button_text"=>"Add ".$this->singular,
			"breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
			"action"=> url($this->action.'/create')
		);
		return view($this->view.'create_edit',$data);
	}
	public function cleanData(&$data) {
        //echo print_r($data); die();
		$unset = ['ConfirmPassword','q','_token'];
		foreach ($unset as $value) {
			if(array_key_exists ($value,$data))  {
				unset($data[$value]);
			}
		}

	}
	
	public function edit(Request $request,$id = NULL)
	{
		if($request->isMethod('post')){
			$data = $request->all();
			$this->cleanData($data);   
			
			$Obj         = School::find($id);
			$Obj->update($data);
			$response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
			echo json_encode($response); return;
		}
		$id = $request->param;
		$data   = array();
		$data   = array(
			"countries" => Country::all()->toArray(),
			"Organization" => Organization::all()->toArray(),
			"page_title"=>"Edit ".$this->singular,
			"page_heading"=>"Edit ".$this->singular,
			"button_text"=>"Update ",
			"breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
			"action"=> url($this->action.'/edit/'.$id)
		);
		$data['row'] = School::find($id)->toArray();
		
		return view($this->view.'create_edit',$data);
	}
	public function delete($id) {
		School::destroy($id);
		$response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
		echo json_encode($response); return;
	}
}
