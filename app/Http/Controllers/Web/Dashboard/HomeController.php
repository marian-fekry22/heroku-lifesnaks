<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\ContactUsMessage;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newOrdersCount = Order::where('order_status_id',1)->count();
        $messagesCount = ContactUsMessage::count();
        return view('dashboard.pages.index', compact(['newOrdersCount','messagesCount']));
    }
}
