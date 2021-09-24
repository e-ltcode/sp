<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\Course;
use Storage;

class UserController extends Controller
{
    private $type     =  "users";
    private $singular =  "User";
    private $plural   =  "Users";
    private $view     =  "admin.users.";
    private $action   =  "/admin/users";
    private $db_key   =  "id";
    private $user = [];
    private $perpage = 50;
    private $directory = "user_images";

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($records,$request,&$data) {

        /*
        SET DEFAULT VALUES
        */          
        if($request->perpage)
            $this->perpage  =   $request->perpage;
        $data['sindex']     = ($request->page != NULL)?($this->perpage*$request->page - $this->perpage+1):1;

        /*
        FILTER THE DATA
        */

        // $records->whereIn('role',[1,2]);

        $params = [];
        if($request->cons_id) {
            $params['cons_id'] = $request->cons_id;
            $records = $records->where("cons_id",$params['cons_id']);
        }
        if($request->is_active) {
            $params['is_active'] = $request->is_active;
            $records = $records->where("is_active",$params['is_active']);
        }

        $data['request'] = $params;
        return $records;    
    }
    public function index(Request $request)
    {
        $data   = array();
        $data   = array(
            "page_title"=>$this->plural." List",
            "page_heading"=>$this->plural.' List',
            "breadcrumbs"=>array("#"=>$this->plural." List"),
            "module"=>['type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key]
        );
        /*
        GET RECORDS
        */
        $records   = User::where('id','!=',\Auth::id());
        // $records   = $records::with('accessoryType');
        $records   = $this->search($records,$request,$data);
        /*
        GET TOTAL RECORD BEFORE BEFORE PAGINATE
        */

        $data['count']      = $records->count();

        /*
        PAGINATE THE RECORDS
        */
        $records            = $records->paginate($this->perpage);
        $records->appends($request->all())->links();
        $links = $records->links();
        $records = $records->toArray();
        $records['pagination'] = $links;

        /*
        ASSIGN DATA FOR VIEW
        */
        $data['list']   =   $records;
        $data['roles'] = Config('constants.roles');
        /*
        DEFAUTL VALUES
        */        
        // dd($data['list']);
        // echo "<pre>"; print_r($data['list']); die();
        

        return view($this->view.'list',$data);
    }
    public function cleanData(&$data) {
        $unset = ['q','_token','c_id'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }
        $int = ['Price','pur_price'];
        foreach ($int as $value) {
            if(array_key_exists ($value,$data))  {
                $data[$value] = (int)str_replace(['(','Rs',')',' ','-','_',','], '', $data[$value]);
            }

        }
        $phone = ['phone'];
        foreach ($phone as $value) {
            if(is_array($data) && array_key_exists($value,$data))  {
                $data[$value] = str_replace(['(',')',' ','-','_','+'], '', $data[$value]);
            }
            if(@$data->$value) {
                $data->$value = str_replace(['(',')',' ','-','_','+'], '', $data->$value);
            }
        }
    }
    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = Storage::putFile($this->directory, $file);
                $data['image'] = $filename;
            }
            $this->cleanData($data);
            $Obj         = new User;
            $Obj->insert($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $data   = array();
        $data   = array(
            "users" => User::all()->toArray(),
            "page_title"=>"Add ".$this->singular,
            "page_heading"=>"Add ".$this->singular,
            "button_text"=>"Add ".$this->singular,
            "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
            "action"=> url($this->action.'/create')
        );
        return view($this->view.'create_edit',$data);
    }

    public function edit(Request $request,$id = NULL)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = Storage::putFile($this->directory, $file);
                $data['image'] = $filename;
            }
            $this->cleanData($data);   
            if(isset($data['password']) && !empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else {
                unset($data['password']);
            }
            $Obj         = User::find($id);
            $Obj->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $id = $request->param;
        $data   = array();
        $data   = array(
            "users" => User::all()->toArray(),
            "page_title"=>"Edit ".$this->singular,
            "page_heading"=>"Edit ".$this->singular,
            "button_text"=>"Update ",
            "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
            "action"=> url($this->action.'/edit/'.$id)
        );
        $data['row'] = User::find($id)->toArray();

        return view($this->view.'create_edit',$data);
    }
    public function update(Request $request,$id = NULL)
    {
        if($request->input('param')){
            $data['is_active'] = $request->input('param');        
            $this->cleanData($data);
            if(isset($data['password']) && !empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }elseif (isset($data['password']) && empty($data['password'])) {
                unset($data['password']);
            }
            $User  = User::find($id);
            $User->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.');
            echo json_encode($response); return;
        }
        
    }
    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }

    public function updateProfile(Request $request){
        try {
            $data = $request->all();
            $this->cleanData($data);
            if(isset($data['password']) && !empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }
            if (isset($data['password']) && empty($data['password']) || $data['password']==NULL) {
                unset($data['password']);
            }
            User::find(\Auth::id())->update($data);
            $response = array('flag'=>true,'msg'=>'Profile Updated Successfully','action'=>'reload');
        } catch (\Exception $e) {
            $response = array('flag'=>false,'msg'=>$e->getMessage());
        }
        return response()->json($response);
    }
}
