<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $type = "currency";
    private $singular = "Currency";
    private $plural = "Currencies";
    private $view = "admin.currency.";
    private $action = "/admin/currency";
    private $db_key = "id";
    private $user = [];
    private $perpage = 10;

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

        $data['list'] = Currency::paginate($this->perpage)->toArray();
        $data['module'] = [
            'type' => $this->type,
            'singular' => $this->singular,
            'plural' => $this->plural,
            'view' => $this->view,
            'action' => $this->action,
            'db_key' => $this->db_key,
        ];
        ///dd($data);

        return view($this->view . 'list', $data);

        // return view('admin/course_lang/list');
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->cleanData($data);
            // Utility::appendRole($data);
            $is_save = Currency::where('name', '=',
                $data['name'])
                ->count();
            if ($is_save > 0) {
                $response = array('flag' => false, 'msg' => $this->singular . ' with Name already exist.');
                echo json_encode($response);return;
            }
            $Obj = new Currency;
            $Obj->insert($data);
            $response = array('flag' => true, 'msg' => $this->singular . ' is added sucessfully.', 'action' => 'reload');
            echo json_encode($response);return;
        }
        $data = array();
        $data = array(
            "page_title" => "Add " . $this->singular,
            "page_heading" => "Add " . $this->singular,
            "button_text" => "Add " . $this->singular,
            "breadcrumbs" => array("dashboard" => "Dashboard", "#" => $this->plural . " List"),
            "action" => url($this->action . '/create'),
        );
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

    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->cleanData($data);
            $is_save = Currency::where('name', '=',
                $data['name'])
                ->where($this->db_key, '!=',
                    $id)
                ->count();
            if ($is_save > 0) {
                $response = array('flag' => false, 'msg' => $this->singular . ' with Name already exist.');
                echo json_encode($response);return;
            }
            $Obj = Currency::find($id);
            $Obj->update($data);
            $response = array('flag' => true, 'msg' => $this->singular . ' is updated sucessfully.', 'action' => 'reload');
            echo json_encode($response);return;
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
        $data['row'] = Currency::find($id)->toArray();

        return view($this->view . 'create_edit', $data);
    }
    public function delete($id)
    {
        Currency::destroy($id);
        $response = array('flag' => true, 'msg' => $this->singular . ' has been deleted.');
        echo json_encode($response);return;
    }
}
