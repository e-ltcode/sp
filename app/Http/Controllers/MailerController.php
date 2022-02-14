<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Quiz;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Events\QuizPurchased;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\View;

class MailerController extends Controller
{

    // =============== [ Email ] ===================
    public function email(Request $request)
    {
        $data = [];
        $obj = OrderItem::with('quiz')->where('order_id', $request->order_id)->get()->toArray();
        $data['order_id'] = $request->order_id;
        $data['quiz'] = [];
        $data['total'] = 0;
        foreach ($obj as $key) {
            $data['quiz'][] = $key['quiz'];
            $data['total'] += $key['quiz']['price'];
        }
        $order = new Order;
        $order = $order->where('user_id', Auth::user()->id)->get()->toArray();
        foreach ($order as $key => $val) {
            $data['email'] = $val['email'];
            $data['name'] = $val['f_name'];
            $data['id'] = $val['user_id'];
        }
        event(new QuizPurchased($data));
        return view("email", ['data' => $data]);
    }
}
