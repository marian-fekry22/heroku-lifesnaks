<?php

namespace App\Http\Controllers\Web\Website;

use App\ContactUsMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactUsRequest;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display Contact us page.
     *
     *      
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.pages.contact-us');
    }

    /**
     * Store contact us details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactUsRequest $request)
    {
        ContactUsMessage::create($request->all());
        return back()->withSuccess([
            'title' => 'Thank you!',
            'description' => 'Your message has been submitted successfully',
        ]);
    }
}
