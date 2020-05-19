<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::
name('dashboard.')->
prefix(RouteServiceProvider::DASHBOARD_HOME)->
namespace('Dashboard')->
group( function () {
    Auth::routes(['register' => false]);
    Route::middleware(['auth','admin'])->group( function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('orders', 'OrderController')->only('index');
        Route::post('orders/update-status', 'OrderController@updateStatus')->name('orders.update_status');
        Route::resource('reviews', 'ReviewController')->only('index');
        Route::post('reviews/update-is-active', 'ReviewController@updateIsActive')->name('reviews.update_is_active');
        Route::resource('promo-codes', 'PromoCodeController');
        Route::resource('products', 'ProductController');
        Route::resource('contact-us-messages', 'ContactUsMessageController')->only(['index','destroy']);
        Route::get('change-password', 'ChangePasswordController@index')->name('change-password.index');
        Route::patch('change-password', 'ChangePasswordController@update')->name('change-password.update');

        Route::
        name('datatable.')->
        prefix('datatable')->
        namespace('Datatable')->
        group( function () {
        	Route::resource('orders', 'OrderController')->only('index');
            Route::get('orders/details/{id}', 'OrderController@details')->name('orders.details');
            Route::resource('reviews', 'ReviewController')->only('index');
            Route::resource('promo-codes', 'PromoCodeController')->only('index');
            Route::resource('contact-us-messages', 'ContactUsMessageController')->only('index');
        });



    });
});

Route::
name('website.')->
prefix(RouteServiceProvider::HOME)->
namespace('Website')->
group( function () {
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('contact-us', 'ContactUsController@index')->name('contact-us.index');
    Route::post('contact-us', 'ContactUsController@store')->name('contact-us.store');
    Route::get('about-us', 'AboutUsController@index')->name('about-us');
    Route::get('our-ingredients', 'OurIngredientsController@index')->name('our-ingredients');
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/{id}/{slug}', 'ProductController@show')->name('products.show');
    Route::post('carts/add', 'CartController@add')->name('carts.add');
    Route::get('carts/remove/{id}', 'CartController@remove')->name('carts.remove');
    Route::get('carts/plus/{id}/{product_details_id}', 'CartController@plus')->name('carts.plus');
    Route::get('carts/minus/{id}/{product_details_id}', 'CartController@minus')->name('carts.minus');

    Route::middleware('cart.items')->group( function () {
        Route::get('view-cart', 'CartController@view')->name('carts.view');
    });

    Route::post('orders/apply-promo-code', 'OrderController@applyPromoCode')->name('orders.apply_promo_code');

    Route::middleware(['auth'])->group( function () {
        Route::middleware('cart.is_reviewed')->group( function () {
            Route::get('checkout', 'OrderController@checkout')->name('orders.checkout');
            Route::post('checkout', 'OrderController@store')->name('orders.store');
        });
        Route::post('products/{id}/submit-review', 'ProductController@submitReview')->name('products.submit_review');
        Route::get('orders', 'OrderController@index')->name('orders.index');
        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::patch('profile', 'ProfileController@update')->name('profile.update');
    });

    Route::get('paymob_notification_callback', 'PaymentController@notification')->name('payment.notification');

    Route::get('paymob_txn_response_callback', 'PaymentController@response')->name('payment.response');

});
