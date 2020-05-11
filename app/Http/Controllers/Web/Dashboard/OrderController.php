<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$orderStatuses = OrderStatus::all();
        return view('dashboard.pages.orders', compact('orderStatuses'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'order_status_id' => 'required|integer|exists:order_statuses,id',
        ]);
        Order::where('id', $request->order_id)->update(['order_status_id' => $request->order_status_id]);
        return ['success' => true, 'message' => 'Order updated successfully'];
    }
}
