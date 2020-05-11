<?php

namespace App\Http\Controllers\Web\Dashboard\Datatable;

use App\Http\Controllers\Controller;
use App\ContactUsMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class ContactUsMessageController extends Controller
{

    public function index(Request $request)
    {
        $query = ContactUsMessage::select('contact_us_messages.*');
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', "%{$request->phone}%");
        }
        return Datatables::of($query)
        ->addColumn('destroy_route', function($contactUsMessage) {
            return route('dashboard.contact-us-messages.destroy', $contactUsMessage->id);
        })->make(true);
    }
}
