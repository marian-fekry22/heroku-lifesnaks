@extends('website.layouts.app')

@section('title','Payment')

@section('content')
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="embed-responsive embed-responsive-16by9">

            <iframe class="embed-responsive-item"  src="https://accept.paymobsolutions.com/api/acceptance/iframes/17146?payment_token={{$payment_token}}"></iframe>
        </div>
    </div>
</div>
<!-- End Cart -->
@endsection

@section('js')


@endsection