@extends('website.layouts.app')

@section('title','Shop')

@section('content')

<!-- Start Products  -->
<div class="products-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-all text-center">
          <h1>Our Products</h1>
          <p></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="special-menu text-center">
          <div class="button-group filter-button-group">
            <button class="active" data-filter="*">All</button>
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
                <ul>
                  <li><a href="{{route('website.products.show',['id' => $product->id, 'slug' => Illuminate\Support\Str::slug($product->name)])}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                </ul>
                <a class="cart" href="#" data-toggle="modal" data-target="#quick-shop-modal-{{$product->id}}">Quick shop</a>
              </div>
            </div>
            <div class="why-text">
              <h4><a href="{{route('website.products.show',['id' => $product->id, 'slug' => Illuminate\Support\Str::slug($product->name)])}}">{{$product->name}}</a></h4>
              <div class="text-right">
                <h5> EGP {{moneyFormat($product->price)}}</h5>
              </div>
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
          <div class="col-lg-6">
            <img class="img-fluid rel-mid-y" src="{{asset($product->main_image_url)}}" alt="{{$product->name}}">
          </div>
          <div class="col-lg-6">
            <div class="single-product-details mt-3">
              <h2>{{$product->name}}</h2>
              <h5> EGP {{moneyFormat($product->price)}}</h5>
              <p>{{$product->description}} </p>
              <form method="POST" action="{{route('website.carts.add')}}" >
                @csrf
                <input type='hidden' name='product_id' value='{{$product->id}}'>
                <ul>
                  <li>
                    <div class="form-group quantity-box">
                      <label class="control-label">Quantity</label>
                      <input class="form-control" name='quantity' value="1" min="1" max="100" type="number">
                    </div>
                  </li>
                </ul>

                <div class="price-box-bar">
                  <div class="cart-and-bay-btn">
                    <button class="btn btn-lg btn-block hvr-hover"  type='submit' >Add to cart</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Quick shop modal  -->
@endforeach

@endsection

@section('js')
<script>
    $(document).ready(function(){
      console.log($('[id^=quick-shop-modal] .row > div:first-child'));
        $('[id^=quick-shop-modal] .row > div:first-child').zoom({
          magnify: 0.35
        });
    });
</script>
@endsection