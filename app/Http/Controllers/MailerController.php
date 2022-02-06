<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Quiz;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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
            // dd($key, 'asadsad');
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

        return view("email", $data);

    }

    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request)
    {
        $data['order_id'] = $request->order_id;
        $data['name'] = $request->user;
        $data['id'] = $request->id;
        $data['quiz'] = [];
        $data['price'] = [];
        $obj = OrderItem::with('quiz')->where('order_id', $request->order_id)->get()->toArray();
        foreach ($obj as $key) {

            $data['quiz'][] = [
                'quiz_title' => $key['quiz']['quiz_title'],
                'price' => $key['quiz']['price'],
            ];

        }

        foreach ($request->quiz['email'] as $key => $val) {
            $data['email'] = $val;
        }

        $data['total'] = $request->quiz['total'];
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true); // Passing `true` enables exceptions

        // $mail = new PHPMailer\PHPMailer\PHPMailer();

        try {
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'svarogproject.com'; //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'email@svarogproject.com'; //  sender username
            $mail->Password = '@_vKN6-7KcN4v;s'; // sender password
            $mail->SMTPSecure = 'ssl'; // encryption - ssl/tls
            $mail->Port = 465; // port - 587/465
            $email = $data['email'];

            $mail->setFrom('email@svarogproject.com', 'Svarog Project');
            $mail->addAddress($email);

            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);
            // $mail->addReplyTo('sender-reply-email', 'sender-reply-name');

            if (isset($_FILES['emailAttachments'])) {
                for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }

            $mail->isHTML(true); // Set email content format to HTML
            $mail->Subject = 'Thank you for purchasing.';
            $emailbody = view('email', $data)->render();
            $mail->Body = $emailbody;

            if ($mail->send()) {
                $response = array('flag' => true, 'msg' => 'Receipt sent successfully.', 'action' => 'reload', 'url' => url('/marketplace'));
                return redirect(url('/'));
            } else {
                return view('home_page');
            }

        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.');
        }
    }
}
