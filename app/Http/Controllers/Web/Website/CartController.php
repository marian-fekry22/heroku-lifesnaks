<?php

namespace App\Http\Controllers\Web\Website;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'product_detail_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return back()->withError(['description' => 'Something went wrong']);
        }
        $product = Product::find($request->product_id);
        $productDetails = ProductDetail::find($request->product_detail_id);

        $cartItems = session('cart.items');
        if (isset($cartItems[$product->id.$productDetails->id])) { // if product already exists
            $cartItems[$product->id.$productDetails->id]['quantity'] += $request->quantity ;
            $cartItems[$product->id.$productDetails->id]['sub_total_per_product'] = $productDetails->price * $cartItems[$product->id.$productDetails->id]['quantity'];
        } else {
            $cartItems[$product->id.$productDetails->id] = [ // if product not in cart
                'product_id' => $product->id,
                'product_details_id' => $productDetails->id,
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price_per_item' => $productDetails->price,
                'image_url' => $product->main_image_url,
                'size' => $productDetails->size ,
                'sub_total_per_product' => $productDetails->price * $request->quantity,
            ];
        }

        Cart::updateSession($cartItems);
        session()->flash('product_id', $product->id);
        return redirect()->route('website.products.index');
    }

    public function remove($id)
    {
        $cartItems = session('cart.items');

        if (isset($cartItems[$id])) {
            unset($cartItems[$id]);
            Cart::updateSession($cartItems);
        }

        return redirect()->route('website.carts.view');
    }

    public function minus(Request $request)
    {
        $cartItems = session('cart.items');
        $product = Product::find($request->id);
        $productDetails = ProductDetail::find($request->product_details_id);

        if (isset($cartItems[$product->id.$productDetails->id])) {

            --$cartItems[$product->id.$productDetails->id]['quantity'];

            if (!$cartItems[$product->id.$productDetails->id]['quantity']) { // if quantity equals 0 remove the product
                unset($cartItems[$product->id.$productDetails->id]);
            } else {
                $cartItems[$product->id.$productDetails->id]['sub_total_per_product'] = $product->price * $cartItems[$product->id.$productDetails->id]['quantity'];
            }

            Cart::updateSession($cartItems);
        }

        return redirect()->route('website.carts.view');


    }

    public function plus(Request $request)
    {
        $cartItems = session('cart.items');
        $product = Product::find($request->id);
        $productDetails = ProductDetail::find($request->product_details_id);

        if (isset($cartItems[$product->id.$productDetails->id])) {

            ++$cartItems[$product->id.$productDetails->id]['quantity'];

            $cartItems[$product->id.$productDetails->id]['sub_total_per_product'] = $productDetails->price * $cartItems[$product->id.$productDetails->id]['quantity'];

            Cart::updateSession($cartItems);
        }

        return redirect()->route('website.carts.view');
    }

    public function view()
    {
        $deliveryFees = 35; // hardcode for now
        $orderPromoCode = session('order.promo_code');
        $cartSubTotal = session('cart.sub_total');

        $orderPromoCodeDiscountAmount = 0;
        if ($orderPromoCode){
            $orderPromoCodeDiscountAmount = $cartSubTotal * ($orderPromoCode['discount_percentage'] / 100);
        }

        $total = $cartSubTotal - $orderPromoCodeDiscountAmount + $deliveryFees;

        session(['order.delivery_fees' => $deliveryFees]);
        session(['order.promo_code_discount_amount' => $orderPromoCodeDiscountAmount]);
        session(['order.total' => $total]);

        session(['cart.is_reviewed' => true]);

        $order = session('order');

        return view('website.pages.cart', compact('order'));
    }
}
