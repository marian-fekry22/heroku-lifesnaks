@extends('website.layouts.app')

@section('title','Shop')

@section('content')

<!-- Start Products  -->
<div class="products-box">
  <div class="container">
    <!-- <div class="row">
      <div class="col-lg-12">
        <div class="title-all text-center">
          <h1>Our Products</h1>
          <p></p>
        </div>
      </div>
    </div> -->
    <div class="row">
      <div class="col-lg-12">
        <div class="special-menu">
        <div class="col-lg-3 products-filter-title">
        Shop @ LifeSnacks
          </div>
          <div class="col-lg-9 button-group filter-button-group">
            <div class="products-filter-title-border">	&nbsp;</div>
            <button class="active" data-filter="*">View All</button>
            @foreach($categories as $category)
            <button data-filter=".{{Illuminate\Support\Str::slug($category->name)}}">{{$category->name}}</button>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="row special-list">
      @foreach($products as $product)
      <div class="col-lg-4 col-md-6 special-grid {{Illuminate\Support\Str::slug($product->category->name)}}">
          <div class="products-single fix">
            <div class="box-img-hover">
              <div class="type-lb">
                <!-- <p class="sale">Sale</p> -->
              </div>
              <img src="{{asset($product->main_image_url)}}" class="img-fluid" alt="Image">
              <div class="mask-icon">
                <a class="cart" href="#" data-toggle="modal" data-target="#quick-shop-modal-{{$product->id}}">Quick Shop</a>
              </div>
            </div>
            <div class="why-text">
              <h4><a href="{{route('website.products.show',['id' => $product->id, 'slug' => Illuminate\Support\Str::slug($product->name)])}}">{{$product->short_name}}</a></h4>
{{--              <div class="text-right">--}}
{{--                <h5> EGP {{moneyFormat($product->price)}}</h5>--}}
{{--              </div>--}}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!-- End Products  -->

@foreach($products as $product)
<!-- Start Quick shop modal  -->
<div class="modal fade" id="quick-shop-modal-{{$product->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Quick shop</h3>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 text-center">
            <img class="img-fluid rel-mid-yrel-mid-y quick-shop-modal-image" src="{{asset($product->main_image_url)}}" alt="{{$product->name}}">
          </div>
          <div class="col-lg-6">
            <div class="single-product-details mt-3">
              <h2>{{$product->name}}</h2>
{{--              <h5> EGP {{moneyFormat($product->price)}}</h5>--}}
              <p>{{$product->description}} </p>
                @foreach($product->productDetails as $productDetail)
                    <form method="POST" action="{{route('website.carts.add')}}" >
                        @csrf
                        <input type='hidden' name='product_id' value='{{$product->id}}'>
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-md-2 p-0 mt-2 text-center">
                                <h5>{{$productDetail->size}}</h5>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 p-0 mt-2 text-center">
                                <h5> EGP {{moneyFormat($productDetail->price)}}</h5>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-2 p-0">
                                <div class="form-group ml-2">
                                    <input class="form-control" name='quantity' value="1" min="1" max="100" type="number">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <button class="btn btn-sm btn-block hvr-hover"  type='submit' >Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <input type='hidden' name='product_detail_id' value='{{$productDetail->id}}'>
                        </div>
                    </form>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if (session()->has('product_id'))
    <script type='text/javascript'>
        $(document).ready(function(){
            $("#quick-shop-modal-{{session('product_id')}}").modal('show');
        });
    </script>
@endif

<!-- End Quick shop modal  -->
@endforeach

@endsection

