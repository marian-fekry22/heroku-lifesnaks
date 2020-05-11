<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    /**
     * Display change password blade.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.change-password');
    }

    /**
     * Update password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChangePasswordRequest $request)
    {
        $authUser = auth()->user();
        $authUser->password = bcrypt($request->new_password);
        $authUser->save();
        return back()->withSuccess('Password changed succesfully');
    }
}
