@extends('website.layouts.app')

@section('title','My Orders')

@section('content')
<!-- Start Cart  -->
<div class="cart-box-main orders-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (count($orders))
                <div class="title-all text-center">
                  <h1>My Orders</h1>
                  <p></p>
                </div>
                <div id="orders-table" class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($orders as $order)
                                <td class="thumbnail-img">
                                    {{$order->id}}
                                </td>
                                <td class="name-pr">
                                    {{$order->created_at->format('d-M-Y')}}
                                </td>
                                <td class="price-pr">
                                    <p>{{$order->total}}</p>
                                </td>
                                <td class="quantity-box">
                                    @if($order->orderStatus->name=='New')
                                    Under Review
                                    @else
                                    {{$order->orderStatus->name}}
                                    @endif
                                </td>
                                <td class="remove-pr">
                                    <a class='btn hvr-hover' data-toggle="modal" data-target="#order-{{$order->id}}-modal">
                                        Details
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$orders->links()}}
                @else
                <div class="no-orders">
                    <div class="no-orders-text">
                        <div class="h1">You haven't placed any orders yet</div>
                        <h1><strong><a href="{{route('website.products.index')}}">Go to shop</a></strong></h1>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->

@if (count($orders))
<!-- Orders Modals -->
@foreach ($orders as $order)
<div class="modal fade" id="order-{{$order->id}}-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Order ID: {{$order->id}} &nbsp; &nbsp; Date Of Order:{{$order->created_at->format('d-M-Y')}}</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderProducts as $orderProduct)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="{{route('website.products.show',['id' => $orderProduct->product->id, 'slug' => Illuminate\Support\Str::slug($orderProduct->product->name)])}}">
                                            <img class="img-fluid" src="{{asset($orderProduct->product->main_image_url)}}" alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{route('website.products.show',['id' => $orderProduct->product->id, 'slug' => Illuminate\Support\Str::slug($orderProduct->product->name)])}}">
                                            {{$orderProduct->product->name}}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>EGP {{moneyFormat($orderProduct->price_per_item)}}</p>
                                    </td>
                                    <td class="quantity-box">


                                        {{$orderProduct->quantity}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <h4>Sub total: EGP {{moneyFormat($order->subtotal)}}</h4>
                <h4>Promo discount: EGP {{moneyFormat($order->promo_code_discount_amount)}}</h4>
                <h4>Delivery fees: EGP {{moneyFormat($order->delivery_fees)}}</h4>
            </div>
            <div class="modal-footer justify-content-start">
                <h3>Total: EGP {{moneyFormat($order->subtotal)}}</h3>
            </div>
        </div>
    </div>
</div>
@endforeach

@endif

@endsection

@section('js')

@endsection
