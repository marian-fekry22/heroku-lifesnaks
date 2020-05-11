<?php

namespace App\Http\Controllers\Web\Dashboard\Datatable;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class ReviewController extends Controller
{

    public function index(Request $request)
    {
        $query = Review::withAllRelations()->select('reviews.*');
        if ($request->filled('review_id')) {
            $query->where('reviews.id', $request->review_id);
        }
        if ($request->filled('customer_name')) {
            $query->whereHas('user', function (Builder $builderQuery) use ($request) {
                $builderQuery->where('name', 'like', "%{$request->customer_name}%");
            });
        }
        if ($request->filled('product_name')) {
            $query->whereHas('product', function (Builder $builderQuery) use ($request) {
                $builderQuery->where('name', 'like', "%{$request->product_name}%");
            });
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }
        return Datatables::of($query)->make(true);
    }
}
