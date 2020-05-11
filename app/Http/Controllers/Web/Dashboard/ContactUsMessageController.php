<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\ContactUsMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.contact-us-messages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactUsMessage::destroy($id);
        return back()->withSuccess('Message Deleted succesfully');
    }
}
