<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Quiz;
use App\User;
use Auth;

class CartItemsController extends Controller
{
    private $type     =  "cart_items";
    private $singular =  "CartItem";
    private $plural   =  "CartItems";
    private $view     =  "admin.cart_items.";
    private $action   =  "/admin/cart_items";
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
        
        $data['list']   =   CartItem::with('quiz','user')->paginate($this->perpage)->toArray();
        $data['total']   =   CartItem::with('quiz')->select('price')->get()->toArray();
        // dd($data['total']);
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
           
            $Obj         = new CartItem;
            // $data['price'] = Auth::id();
        // $rows = Quiz::where('id',$request->id)->get()->toArray();
        // dd($rows);
            $Obj->insert($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            // return redirect(url('marketplace'));
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
        $data['quizes'] = Quiz::all();
        $data['users'] = User::all();
        // $data['orders'] = Order::all();
        // $data['payment_types'] = config('constants.payment_type');
        

        return view($this->view.'create_edit',$data);
    }
    public function cleanData(&$data) 
    {
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
           
            $Obj         = CartItem::find($id);
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
        $data['quizes'] = Quiz::all();
        $data['users'] = User::all();
        // $data['orders'] = Order::all();
        // $data['payment_types'] = config('constants.payment_type');
        $data['row'] = CartItem::find($id)->toArray();
      
        return view($this->view.'create_edit',$data);
    }
    public function delete($id) {
        CartItem::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
}
