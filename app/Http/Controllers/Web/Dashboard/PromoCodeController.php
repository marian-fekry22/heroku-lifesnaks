<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PromoCodeRequest;
use App\PromoCode;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.promo-codes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\PromoCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromoCodeRequest $request)
    {
        PromoCode::create($request->all());
        return back()->withSuccess('Promo code added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promoCode = PromoCode::findOrFail($id);
        return view('dashboard.pages.promo-codes', compact('promoCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\PromoCodeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromoCodeRequest $request, $id)
    {
        PromoCode::where('id', $id)->update($request->except('_token','_method'));
        return back()->withSuccess('Promo code updated successfully');
    }

}
