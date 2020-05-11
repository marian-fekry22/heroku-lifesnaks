@extends('website.layouts.app')

@section('title','Checkout')

@section('content')
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <form class="needs-validation values-form old-form" action="{{route('website.orders.store')}}" method="POST" novalidate>
            @csrf
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="country">Country *</label>
                                    <input type="text" name="country" class="form-control" placeholder="Country">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="governorate">Governorate *</label>
                                    <input type="text" name="governorate" class="form-control" placeholder="Governorate">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="city">City/Area *</label>
                                    <input type="text" name="city" class="form-control" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Address *</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="building">Building</label>
                                    <input type="text" name="building" class="form-control" placeholder="Building">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="floor">Floor</label>
                                    <input type="text" name="floor" class="form-control" placeholder="Floor">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="apartment">Apartment</label>
                                    <input type="text" name="apartment" class="form-control" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mobile">Mobile *</label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="landline">Landline *</label>
                                    <input type="text" name="landline" class="form-control" placeholder="Landline">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @if($cart['items'] && count($cart['items']))
                                    @foreach($cart['items'] as $id => $item)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body">
                                            <a href="{{route('website.products.show',['id' => $id, 'slug' => Illuminate\Support\Str::slug($item['name'])])}}">
                                                <img class="img-fluid" src="{{asset($item['image_url'])}}" alt="" />
                                            </a>
                                            <a href="{{route('website.products.show', ['id' => $id, 'slug' => Illuminate\Support\Str::slug($item['name'], "-"), ])}}">
                                                {{$item['name']}}
                                            </a>
                                            <div class="text-muted">Price: EGP {{moneyFormat($item['price_per_item'])}} <span class="mx-2">|</span> Qty: {{$item['quantity']}} <span class="mx-2">|</span> Subtotal: EGP {{moneyFormat($item['sub_total_per_product'])}}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Order summary</h3>
                                </div>
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> EGP {{moneyFormat($cart['sub_total'])}}</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Promo Code Discount</h4>
                                    <div class="ml-auto font-weight-bold"> 
                                        @if($order['promo_code_discount_amount'] == 0)        
                                        -
                                        @else
                                        - EGP {{moneyFormat($order['promo_code_discount_amount'])}}
                                        @endif


                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Delivery Fees</h4>
                                    <div class="ml-auto font-weight-bold"> 
                                        @if($order['delivery_fees'] == 0)        
                                        Free
                                        @else
                                        EGP {{moneyFormat($order['delivery_fees'])}}
                                        @endif
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> EGP {{moneyFormat($order['total'])}} </div>
                                </div>
                                <hr> 
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Payment Method</h3>
                                </div>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="cod" name="payment_method_id" type="radio" value='1' class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="cod">Cash On Delivery</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="card" name="payment_method_id" type="radio" value='2' class="custom-control-input" required>
                                        <label class="custom-control-label" for="card">Visa/Master Card</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex shopping-box">
                            <button class="ml-auto btn hvr-hover">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Cart -->
@endsection

@section('js')

@if($errors->any())
@include('website.partials.js.old')
@else
@include('website.partials.js.values', ['values' => $authUser] )
@endif

@endsection