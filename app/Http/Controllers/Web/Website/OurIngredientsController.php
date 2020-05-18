<?php

namespace App\Http\Controllers\Web\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurIngredientsController extends Controller
{
    /**
     * Display Contact us page.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.pages.our-ingredients');
    }

}
