<?php

namespace App\Http\Controllers\Web\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentNotification;
use App\PaymentResponse;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\OrderPayment;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    

    public function notification(Request $request){
        $notification = new PaymentNotification;
        $notification->obj= $request->obj;
        $notification->order_id=$request->obj->order->id;
        $notification->type= $request->type;
        $notification->save();
        return true;
      

    }

    public function response(Request $request){
        
        $authUser = auth()->user();
        $response = new PaymentResponse;
        $response->success =(int)$request->success;
        $response->order_id =(int)$request->order;
        $response->request = $request->all();
        $response->save();
        
        if($request->success == true){
            $responseAuth = Http::post('https://accept.paymobsolutions.com/api/auth/tokens', [
                'username'=>\Config::get('app.ACCEPT_USERNAME'),
                'password'=>\Config::get('app.ACCEPT_PASSWORD')
            ]);
            $bodyAuth= json_decode($responseAuth->body(), true);
            $authToken = $bodyAuth['token'];
            $orderId=$request->order;
    
            $responseOrder = Http::get('https://accept.paymobsolutions.com/api/ecommerce/orders/'.$orderId.'?token='.$authToken);
            
    
            $order_from_gateway= json_decode($responseOrder, true);
            //dd($order_from_gateway);
            if($order_from_gateway['paid_amount_cents'] != $order_from_gateway['amount_cents'] )
            {
                return 'something went wrong';
            }

            $order_payment= OrderPayment::where('gateway_order_id', $request->order)->first();
            $order= Order::find((int)$order_payment->order_id);
            $order->order_status_id = 1;
            $order->save();
            session()->forget(['cart', 'order']);

            Mail::to($authUser)->send(new OrderCreated($order->id));

            return redirect()->route('website.products.index')->withSuccess([
                'title' => 'Thank you!',
                'description' => 'Your order has been placed, you will recieve an e-mail with your order details',
            ]);
        }
        else{

            if($request->txn_response_code== 1){
                $error_description='There was an error processing the transaction';
            }
            elseif($request->txn_response_code== 2){
                $error_description='Contact card issuing bank';
            }

            elseif($request->txn_response_code== 4){
                $error_description='Expired Card';
            }
            elseif($request->txn_response_code== 5){
                $error_description='Insufficient Funds';
            }
            elseif($request->txn_response_code== 6){
                $error_description='Payment is already being processed';
            }
            else{
                $error_description='Error processing payment, contact you bank for more information.';
            }


            return redirect()->route('website.products.index')->withSuccess([
                'title' => 'Problem with payment!',
                'description' => $error_description,
            ]);

        }

        

    }

}
