<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Quiz;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    private $type = "cart_items";
    private $singular = "CartItem";
    private $plural = "CartItems";
    private $view = "cart_items.";
    private $action = "/cart_items";
    private $db_key = "id";
    private $user = [];
    private $perpage = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $data = array();
        $data = array(
            "page_title" => $this->plural . " List",
            "page_heading" => $this->plural . ' List',
            "breadcrumbs" => array("#" => $this->plural . " List"),
        );
        if ($request->perpage) {
            $this->perpage = $request->perpage;
        }

        $data['list'] = CartItem::with('quiz', 'user')->where('user_id', Auth::user()->id)->paginate($this->perpage)->toArray();
        $data['total'] = CartItem::with('quiz')->select('price')->where('user_id', Auth::user()->id)->get()->toArray();
        // dd($data['total']);
        $data['module'] = [
            'type' => $this->type,
            'singular' => $this->singular,
            'plural' => $this->plural,
            'view' => $this->view,
            'action' => $this->action,
            'db_key' => $this->db_key,
        ];

        // if(CartItem::where('user_id',Auth::user()->id)->count() == 0){
        // echo "<script>alert('Cart Is Empty')</script>";
        // return redirect(url('marketplace'));
        // }else{
        return view($this->view . 'list', $data);

        // return view('admin/course_lang/list');
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->cleanData($data);
            // Utility::appendRole($data);

            $Obj = new CartItem;
            // $data['price'] = Auth::id();
            // $rows = Quiz::where('id',$request->id)->get()->toArray();
            // dd($rows);
            $Obj->insert($data);
            $response = array('flag' => true, 'msg' => $this->singular . ' is added sucessfully.', 'action' => 'reload');
            // return redirect(url('marketplace'));
            echo json_encode($response);
            return;
        }
        $data = array();
        $data = array(
            "page_title" => "Add " . $this->singular,
            "page_heading" => "Add " . $this->singular,
            "button_text" => "Add " . $this->singular,
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            "action" => url($this->action . '/create'),
        );
        $data['quizes'] = Quiz::all();
        $data['users'] = User::all();
        // $data['orders'] = Order::all();
        // $data['payment_types'] = config('constants.payment_type');

        return view($this->view . 'create_edit', $data);
    }
    public function cleanData(&$data)
    {
        //echo print_r($data); die();
        $unset = ['ConfirmPassword', 'q', '_token'];
        foreach ($unset as $value) {
            if (array_key_exists($value, $data)) {
                unset($data[$value]);
            }
        }
    }

    public function checkout(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {

            $checkout_obj = new Order;
            $total = CartItem::with('quiz')->select('price')->where('user_id', Auth::user()->id)->get()->toArray();
            $checkout_data = [
                'user_id' => Auth::user()->id,
                'amount' => collect($total)->flatten()->sum(),
                'f_name' => $request->f_name,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ];

            $order = $checkout_obj->create($checkout_data);

            $data = CartItem::with('quiz')->select('quiz_id')->get()->toArray();
            foreach ($data as $key => $value) {
                $data = ['status' => 'purchased'];
                $new_data = Quiz::find($value['quiz_id']);
                // $new_data->update($data);
            }
            $response = array(
                'flag' => true,
                'msg' => 'Checkout completed sucessfully.',
                'action' => 'reload',
                'order_id' => $order->id,
            );
            echo json_encode($response);
            return;
        }

        $data = [];
        $data['total_amount'] = collect(CartItem::with('quiz')->select('price')->where('user_id', Auth::user()->id)->get()->toArray())->flatten()->sum();
        if (CartItem::where('user_id', Auth::user()->id)->count() == 0) {
            return redirect(url('marketplace'));
        } else {
            return view('checkout', $data);
        }
    }
    public function accept_payment(Request $request)
    {

        if ($request->isMethod('post')) {

            $order = Order::where('id', $request->local_order);
            $data_update = [
                'order_status' => 'completed',
                'order_id' => $request->orderID,
                'payer_id' => $request->payerID,
            ];

            $order_item = new OrderItem;
            $data_order_item = CartItem::all();
            foreach ($data_order_item as $key => $val) {

                $data_insert = [
                    'user_id' => $val['user_id'],
                    'quiz_id' => $val['quiz_id'],
                    'order_id' => $request->local_order,
                    'order_id' => $request->local_order,
                    'amount' => $val['price'],
                    'created_by' => Auth::user()->id,
                ];
                $order_item->create($data_insert);
            }

            $cart = CartItem::where('user_id', Auth::user()->id)->get()->toArray();
            $id = Auth::user()->id;
            // dd($cart);
            // foreach ($cart as $key => $val) {
            //     $quiz = Quiz::where('id', $val['quiz_id'])->get()->toArray();
            //     foreach ($quiz as $k => $v) {
            //         if ($v['type'] == 'premium') {
            //             $user = User::find($id);
            //             $role = [
            //                 'role' => '4',
            //             ];
            //             $user->update($role);
            //         }
            //     }
            // }

            CartItem::where('user_id', Auth::user()->id)->delete();
            $order->update($data_update);
        }
    }
    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->cleanData($data);

            $Obj = CartItem::find($id);
            $Obj->update($data);
            $response = array('flag' => true, 'msg' => $this->singular . ' is updated sucessfully.', 'action' => 'reload');
            echo json_encode($response);
            return;
        }
        $id = $request->param;
        $data = array();
        $data = array(
            "page_title" => "Edit " . $this->singular,
            "page_heading" => "Edit " . $this->singular,
            "button_text" => "Update ",
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            "action" => url($this->action . '/edit/' . $id),
        );
        $data['quizes'] = Quiz::all();
        $data['users'] = User::all();
        // $data['orders'] = Order::all();
        // $data['payment_types'] = config('constants.payment_type');
        $data['row'] = CartItem::find($id)->toArray();

        return view($this->view . 'create_edit', $data);
    }
    public function delete($id)
    {
        CartItem::destroy($id);
        $response = array('flag' => true, 'msg' => $this->singular . ' has been deleted.');
        echo json_encode($response);
        return;
    }
}
