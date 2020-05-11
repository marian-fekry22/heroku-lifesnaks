<?php

namespace App\Http\Controllers\Web\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ProfileRequest;
use App\User;
use Illuminate\Http\Request;
class ProfileController extends Controller
{
    public function edit()
    {
        $authUser = auth()->user()->load('shippingDetail');
        return view('website.pages.profile', compact('authUser'));
    }

    public function update(ProfileRequest $request)
    {
        $authUser = auth()->user();
        $authUser->shippingDetail()->update($request->except('_token','_method'));
        return back()->withSuccess([
            'title' => 'Profile updated',
            'description' => 'You have succesfully updated your profile',
        ]);
    }
}