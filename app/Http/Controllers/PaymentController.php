<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

// init composer autoloader.
require '../vendor/autoload.php';

use Cixware\Esewa\Client;
use Cixware\Esewa\Config;
class PaymentController extends Controller
{
    public function pay(Request $request){
        $course_id = uniqid();
        $amount = $request->amount;

        Order::insert([
            'user_id'=> $request->user_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'user_id'=> $request->user_id,
            'course_id'=>$course_id,
            'amount'=> $request->amount,
            'esewa_status'=> 'unverified',
            'created_at' => Carbon::now(),
        ]);

        // set success and failure callback urls
        $successUrl = url('/success');
        $failureUrl = url('/failure');

        // config for development
        $config = new Config($successUrl, $failureUrl);

        // initialize eSewa client
        $esewa = new Client($config);

        $esewa->process($course_id, $amount, 0, 0, 0);
    }

    public function paySuccess(){
        $course_id = $_GET['oid'];
        $refID = $_GET['refId'];
        $amount = $_GET['amt'];

        $order = Order::where('course_id', $course_id)->first();

        $status = Order::find($order->id)->update([
            'esewa_status'=>'verified',
            'updated_at' => Carbon::now(),
        ]);
        if($status){
            $message= 'Successful Payment';
            $success_message= 'Payment Successfull !! Course Purchased !! Thank You !!';
            return view('success',compact('message','success_message'));

        }
    }
    public function payFailure(){
        $course_id = $_GET['pid'];
        $order = Order::where('course_id', $course_id)->first();
        $status = Order::find($order->id)->update([
            'esewa_status'=>'failed',
            'updated_at' => Carbon::now(),
        ]);
        if($status){
            $message= 'Failed';
            $success_message= 'Contact Admininstrator !! Thank You !!';
            return view('success',compact('message','success_message'));

        }
    }
}
