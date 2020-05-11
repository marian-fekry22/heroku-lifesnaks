@extends('website.layouts.app')

@section('title','Cart')

@section('content')
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="title-all text-center">
              <h1>View Cart</h1>
              <p></p>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if($cart['items'] && count($cart['items']))
                                @foreach($cart['items'] as $id =>$item)
                                <td class="thumbnail-img">
                                    <a href="{{route('website.products.show',['id' => $id, 'slug' => Illuminate\Support\Str::slug($item['name'])])}}">
                                        <img class="img-fluid" src="{{asset($item['image_url'])}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="{{route('website.products.show',['id' => $id, 'slug' => Illuminate\Support\Str::slug($item['name'])])}}">
                                        {{$item['name']}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>{{moneyFormat($item['price_per_item'])}}</p>
                                </td>
                                <td class="quantity-box">

                                    <a href="{{ route('website.carts.minus', ['id' => $id]) }}">
                                        <i class="fas fa-minus"></i>
                                    </a> 	&nbsp;
                                    {{$item['quantity']}} 	&nbsp;
                                    <a href="{{ route('website.carts.plus', ['id' => $id]) }}">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </td>
                                <td class="total-pr">
                                    <p>{{moneyFormat($item['sub_total_per_product'])}}</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="{{ route('website.carts.remove', ['id' => $id]) }}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <h6><a href="#">Cart is empty </a></h6>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12">
                <div class="col-lg-6 col-sm-8">
                    <div class="coupon-box ">
                        <form class="old-form" method="POST" action="{{route('website.orders.apply_promo_code')}}" >
                            @csrf
                            <div class="input-group input-group-sm">
                                <input class="form-control" placeholder="Do you have a promo code? Enter here" name="promo_code" aria-label="Coupon code" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="submit">Apply Code</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Sub Total</h4>
                        <div class="ml-auto font-weight-bold"> EGP {{moneyFormat($cart['sub_total'])}}</div>
                    </div>

                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Promo Code Discount</h4>
                        <div class="ml-auto font-weight-bold"> 
                            @if($order['promo_code_discount_amount'])        
                            - EGP {{moneyFormat($order['promo_code_discount_amount'])}}
                            @else
                            -
                            @endif


                        </div>
                    </div>

                    <div class="d-flex">
                        <h4>Delivery Fees</h4>
                        <div class="ml-auto font-weight-bold"> 
                            @if($order['delivery_fees'])        
                            EGP {{moneyFormat($order['delivery_fees'])}}
                            @else
                            Free
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5"> EGP {{moneyFormat($order['total'])}} </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="{{route('website.orders.checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
        </div>
    </div>
</div>
<!-- End Cart -->

@endsection

@section('js')

@if(isset($order['promo_code']))
<script>
    $('[name=promo_code]').val('{{$order['promo_code']['name']}}');
</script>
@endif

@if(old())
@include('website.partials.js.old')
@endif
@endsection