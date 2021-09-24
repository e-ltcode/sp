<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;
use App\Models\CartItem;
use App\User;
use Auth;

class OrdersController extends Controller
{
    private $type     =  "orders";
    private $singular =  "Order";
    private $plural   =  "Orders";
    private $view     =  "admin.orders.";
    private $action   =  "/admin/orders";
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
        
        $data['list']   =   Order::paginate($this->perpage)->toArray();
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
           
            $Obj         = new Order;
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
        $data['users'] = User::all();
        $data['payment_types'] = config('constants.payment_type');
        

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
           
            $Obj         = Order::find($id);
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
        $data['users'] = User::all();
        $data['payment_types'] = config('constants.payment_type');
        $data['row'] = Order::find($id)->toArray();
      
        return view($this->view.'create_edit',$data);
    }
    public function delete($id) {
        Order::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
}
