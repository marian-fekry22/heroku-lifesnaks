<?php

namespace App\Http\Controllers\Web\Dashboard\Datatable;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class OrderController extends Controller
{

    public function index(Request $request)
    {
        $query = Order::withAllRelations()->select('orders.*');
        $query->when($request->order_id, function ($q, $order_id) {
            $q->where('orders.id', $order_id);
        });
        $query->when($request->customer_name, function ($q, $customer_name) {
            $q->whereHas('user', function (Builder $builderQuery) use ($customer_name) {
                $builderQuery->where('name', 'like', "%{$customer_name}%");
            });
        });
        $query->when($request->promo_code, function ($q, $promo_code) {
            if ($promo_code === 'N/A') {
                $q->whereNull('promo_code_id');
            } else {
                $q->whereHas('promoCode', function (Builder $builderQuery) use ($promo_code) {
                    $builderQuery->where('name', 'like', "%{$promo_code}%");
                });
            }
        });
        $query->when($request->order_status_id, function ($q, $order_status_id) {
            $q->where('order_status_id', $order_status_id);
        });
        return Datatables::of($query)
        ->addColumn('details_url', function($order) {
            return route('dashboard.datatable.orders.details', $order->id);
        })
        ->make(true);
    }

    public function details($orderId)
    {
        $query = OrderProduct::where('order_id', $orderId)->with('product')->select('order_product.*');
        return Datatables::of($query)->make(true);
    }
}
