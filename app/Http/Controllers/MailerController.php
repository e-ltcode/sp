<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Events\QuizPurchased;
use Illuminate\Support\Facades\Session;

class MailerController extends Controller
{

    // =============== [ Email ] ===================
    public function email(Request $request)
    {
        $data = [];
        $obj = OrderItem::with('quiz')->where('order_id', $request->order_id)->first()->toArray();
        $data['order_id'] = $request->order_id;
        $data['quiz'] = [];
        $data['total'] = 0;
        $data['quiz'][] = $obj['quiz'];
        $data['total'] += $obj['quiz']['price'];
        $data['quiz_title'] = $obj['quiz']['quiz_title'];

        $order = new Order;
        $order = $order->where('user_id', Auth::user()->id)->first()->toArray();

        $data['email'] = $order['email'];
        $data['name'] = $order['f_name'];
        $data['id'] = $order['user_id'];
        $data['created_at'] = Carbon::parse($order['created_at'])->toDateTimeString();

        event(new QuizPurchased($data));
        Session::flash('message', 'You have successfully Purchased ' . $data['quiz_title']);
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('marketplace');
    }
}
