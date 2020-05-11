<?php

namespace App\Http\Controllers\Web\Dashboard\Datatable;

use App\Http\Controllers\Controller;
use App\PromoCode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class PromoCodeController extends Controller
{

    public function index(Request $request)
    {
        $query = PromoCode::select('promo_codes.*');
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }
        if ($request->filled('discount_percentage')) {
            $query->where('discount_percentage', $request->discount_percentage);
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }
        return Datatables::of($query)->make(true);
    }
}
