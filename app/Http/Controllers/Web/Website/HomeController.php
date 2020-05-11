<?php

namespace App\Http\Controllers\Web\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display Homepage.
     *      
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Http::get('https://graph.instagram.com/me/media?fields=thumbnail_url,media_url,permalink&access_token='.config('services.instagram.generated_token'));
            $instagramMedia = $response->json()['data'];
            return view('website.pages.index', compact('instagramMedia'));
        } catch (\Exception $e) {
            return view('website.pages.index');
        }
    }

}
