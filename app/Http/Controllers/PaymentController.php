<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

require '../vendor/autoload.php';

use Cixware\Esewa\Client;
use Cixware\Esewa\Config;

class PaymentController extends Controller
{
    public function index(Product $product)
    {
        dd($product);
        $product=Product::query()->where('id', $product->id)->with('orders')->get();
        return view('ordernow');
    }
    public function pay(Request $request){
        
        // dd($request->amount);
        $product_id = $request->product_id;
        $amount = $request->amount;

        Payment::insert([
            'email'=> $request->email,
            'user_id'=> $request->user_id,
            'product_id'=>$request->product_id,
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

        $esewa->process($product_id, $amount, 0, 0, 80);
    }

    public function paySuccess(){
        $product_id = $_GET['oid'];
        $refID = $_GET['refId'];
        $amount = $_GET['amt'];

        $payment = Payment::where('product_id', $product_id)->first();

        $status = Payment::find($payment->id)->update([
            'esewa_status'=>'verified',
            'updated_at' => Carbon::now(),
        ]);
        
        $userId= Session::get('user')['id'];
        Cart::where('user_id',$userId)->delete();
        if($status){
            $message= 'Successful Payment';
            $success_message= 'Payment Successfull !! Product Purchased !! Thank You !!';
            return view('success',compact('message','success_message'));

        }
    }
    public function payFailure(){
        $product_id = $_GET['pid'];
        $product = Payment::where('product_id', $product_id)->first();
        $status = Payment::find($product->id)->update([
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
