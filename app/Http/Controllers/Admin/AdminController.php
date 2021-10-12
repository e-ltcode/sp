<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{

	public function index(){

		return view('admin/dashboard');
	}
	public function profile(){
		$data = [];
		return view('admin/profile_page',$data);
	}
	public function edit_login_details(Request $request,$user_id=null){

		$data = [];
		if($request->isMethod('post')){
			$data_new = $request->validate([
				'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			]);
			$data = [
				'email' => $request->email,
				'password' => Hash::make($request->password),
			];
			$obj = User::where('id',Auth::user()->id);
    		// dd($obj->get()->toArray());
			$obj->update($data);
			$response = array('flag'=>true,'msg'=>'Login Details is updated sucessfully.','action'=>'reload');
			echo json_encode($response); return;
		}
		$data = [
			'page_title' => 'Login details',
			'action' => url('admin/edit_login_details')
		];
		$user_id = Auth::user()->id;
		$data['row'] = User::where('id', Auth::user()->id)->get()->first()->toArray();
    	// dd($data['row']);
		return view('admin/edit_login_details',$data);	
	}
}
