<?php

namespace App\Http\Controllers\Web\Website;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\PromoCode;
use App\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$categories = Category::all();
    	$products = Product::with('category')->get();
        return view('website.pages.shop', compact('categories','products'));
    }

    public function show($id)
    {
        $product = Product::withAllRelationsConditioned()->find($id);
        return view('website.pages.product', compact('product'));
    }

    public function submitReview (Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rate' => 'required|integer',
            'description' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $authUser = auth()->user();

        $isTriedByUser = Product::where('id', $id)->whereHas('orders.orderStatus', function (Builder $q) use($authUser) {
            $q->where('orders.user_id', $authUser->id)->whereIn('order_statuses.name', ['Finished','Disposed']);
        })->exists();

        if (!$isTriedByUser) {
            return back()->withInfo([
                'title' => 'Try it first &#128521;',
                'description' => 'Please try the product first, then leave a review!',
            ]);
        }

        $isReviewedPreviously = $authUser->reviews()->where('product_id', $id)->exists();

        if ($isReviewedPreviously) {
            return back()->withInfo([
                'title' => 'Item reviewed previously',
                'description' => "You\'ve already reviewed this item",
            ]);
        }

        $newReview = new Review($request->all());
        $newReview->product_id = $id;

        $authUser->reviews()->save($newReview);

        return back()->withSuccess([
            'title' => 'Thank you!',
            'description' => 'Your review has been submitted, will be published soon',
        ]);
    }
}
