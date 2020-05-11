<?php

namespace App\Http\Controllers\Web\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\OrderRequest;
use App\Mail\OrderCreated;
use App\Order;
use App\PromoCode;
use App\OrderPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function applyPromoCode(Request $request){

        $validator = Validator::make($request->all(), [
            'promo_code' => 'required|exists:promo_codes,name'
        ]);

        if ($validator->fails()) {
            return redirect()->route('website.carts.view')->withError([
                'title' => 'Invalid promo code',
                'description' => 'Please make sure you typed it correctly',
            ])->withInput();
        }
        
        $promoCode = PromoCode::where('name',$request->promo_code)->first();

        if ($promoCode->isValid()){
            $orderPromoCode = [
                'id' => $promoCode->id,
                'name' => $promoCode->name,
                'discount_percentage' => $promoCode->discount_percentage,
            ];

            session(['order.promo_code' => $orderPromoCode]);
            return redirect()->route('website.carts.view')->withSuccess([
                'title' => 'Promo code applied succesfully',
                'description' => $orderPromoCode['discount_percentage'].'% discount is applied to your order',
            ])->withInput();
        } else {
            return redirect()->route('website.carts.view')->withError([
                'title' => 'Expired promo code',
                'description' => 'This promo code is no longer valid',
            ])->withInput();

        }
    }

    /**
     * Display checkout form.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $authUser = auth()->user()->load('shippingDetail');
        
        // prepare for form
        foreach ($authUser->shippingDetail->getAttributes() as $key => $value) {
            $authUser->{$key} = $value;
        }

        $order = session('order');
        return view('website.pages.checkout', compact('authUser','order'));
    }

    /**
     * Store a newly created order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        
        $cart = session('cart');
        $order = session('order');
        $authUser = auth()->user();
        $newOrder = new Order($request->all());
        if (isset($order['promo_code'])) {
            $newOrder->promo_code_id = $order['promo_code']['id'];
        }
        $newOrder->subtotal = $cart['sub_total'];
        $newOrder->promo_code_discount_amount = $order['promo_code_discount_amount'];
        $newOrder->delivery_fees = $order['delivery_fees'];
        $newOrder->total = $order['total'];
        
        if($request->payment_method_id==2){

            //Waiting For Payment Order Status id=5
            $newOrder->order_status_id = 5;
            $newOrder->payment_method_id= 2;
        }

        else{
            //cash on delivery
            $newOrder->payment_method_id = 1;

        }
      
        $authUser->orders()->save($newOrder);
        
        $products = [];

        foreach ($cart['items'] as $id => $value) {
            $products[$id] = [
                'quantity' => $value['quantity'],
                'price_per_item' => $value['price_per_item'],
            ];
        }        

        $newOrder->products()->sync($products);


        if($request->payment_method_id==2){

            $responseAuth = Http::post('https://accept.paymobsolutions.com/api/auth/tokens', [
                'api_key' => \Config::get('app.ACCEPT_API_KEY'),
                'username'=>\Config::get('app.ACCEPT_USERNAME'),
                'password'=>\Config::get('app.ACCEPT_PASSWORD')
            ]);
            $bodyAuth= json_decode($responseAuth->body(), true);
            
            $responseOrder = Http::post('https://accept.paymobsolutions.com/api/ecommerce/orders', [
                'auth_token' => $bodyAuth['token'],
                'delivery_needed'=>true,
                'merchant_id'=> \Config::get('app.ACCEPT_MERCH_ID'),
                'amount_cents'=>$newOrder->total*100,
                "currency" => "EGP",
                "items" => [],
            ]);
            $bodyOrder= json_decode($responseOrder->body(), true);
            $newOrderPayment = new OrderPayment($request->all());
            $newOrderPayment->user_id= $newOrder->user_id;
            $newOrderPayment->order_id= $newOrder->id;
            $newOrderPayment->gateway_order_id= $bodyOrder['id'];
            $newOrderPayment->save();

            $getPayment_key = Http::post('https://accept.paymobsolutions.com/api/acceptance/payment_keys', [
                'auth_token' => $bodyAuth['token'],
                'order_id'=>$newOrderPayment->gateway_order_id,
                'amount_cents'=>$newOrder->total*100,
                "currency" => "EGP",
                "integration_id"=>  \Config::get('app.ACCEPT_CARD_INTEG_ID'),
                "expiration"=> 3600,
                "billing_data"=>[
                    "apartment" => $newOrder->apartment, 
                    "email" => $authUser->email, 
                    "floor" => $newOrder->floor, 
                    "first_name" => $authUser->name, 
                    "street" => $newOrder->address, 
                    "building" => $newOrder->building, 
                    "phone_number" => $newOrder->mobile, 
                    "shipping_method" => "NA", 
                    "postal_code" => "NA", 
                    "city" => $newOrder->city, 
                    "country" => "EG", 
                    "last_name" => 'NA', 
                    "state" => $newOrder->governorate
                ]
                
            ]);
            $paymentbody= json_decode($getPayment_key->body(), true);
            
            $payment_token= $paymentbody['token'];
            
            return view('website.pages.payment', compact('payment_token'));
        }
        else{
            session()->forget(['cart', 'order']);

            Mail::to($authUser)->send(new OrderCreated($newOrder->id));
    
            return redirect()->route('website.products.index')->withSuccess([
                'title' => 'Thank you!',
                'description' => 'Your order has been placed, you will recieve an e-mail with your order details',
            ]);
        }
        
    }

    public function index(){
        $authUser = auth()->user();
        $orders = Order::where('user_id',$authUser->id)->whereIn('order_status_id',[1,2,3])->with('orderStatus','orderProducts.product')->latest('id')->paginate(10);

        return view('website.pages.orders', compact('orders'));

    }

}
