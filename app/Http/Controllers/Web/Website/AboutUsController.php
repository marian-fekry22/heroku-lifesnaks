<?php

namespace App\Http\Controllers\Web\Website;

use App\ContactUsMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactUsRequest;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display Contact us page.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.pages.about-us');
    }

}
