@extends('website.layouts.app')

@section('title','Shop')

@section('content')
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-interval="false" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($product->orderedImages as $key => $image)
                        <div class="carousel-item {{$key ? '' : 'active'}}">
                            <a data-fancybox="gallery" href="{{asset($image->url)}}" alt="{{$product->name}} {{$image->id}} slide">
                                <img class="d-block w-100" src="{{asset($image->url)}}" alt="{{$product->name}} {{$image->id}} slide">
                            </a>
                             </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                    <ol class="carousel-indicators">
                        @foreach($product->orderedImages as $key => $image)
                        <li {!!$key ? '' : 'class="active"'!!} data-target="#carousel-example-1" data-slide-to="{{$key}}">
                            <img class="d-block w-100 img-fluid" src="{{asset($image->url)}}" alt="" />
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2>{{$product->name}}</h2>
                    <h5> EGP {{moneyFormat($product->price)}}</h5>
                    <h4>Description:</h4>
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

        <div class="row my-5">
            <div class="card card-outline-secondary my-4 w-100">
                <div class="card-header">
                    <h2>Product Reviews</h2>
                </div>
                <div class="card-body">
                    <div class="stars">
                        @for ($i = 1; $i < 6; $i++)
                        <span class="fa fa-star star-{{$i > $product->activeReviews->avg('rate') ? 'empty' : 'filled'}}"></span>
                        @endfor
                    </div>
                    <span style="font-weight: bold;">{{count($product->activeReviews)}} customer ratings</span>
                    <div>
                        <span style="font-weight: bold;">5 Stars </span> <meter id="disk_c_5" value="{{$fivePer}}" min="0" max="10">{{$fivePer}}</meter><span style="font-weight: bold;"> {{$fivePer}}%</span><br/>
                        <span style="font-weight: bold;">4 Stars </span><meter id="disk_c_4" value="{{$fourPer}}" min="0" max="10">{{$fourPer}}</meter><span style="font-weight: bold;"> {{$fourPer}}%</span><br/>
                        <span style="font-weight: bold;">3 Stars </span><meter id="disk_c_3" value="{{$threePer}}" min="0" max="10">{{$threePer}}</meter><span style="font-weight: bold;"> {{$threePer}}%</span><br/>
                        <span style="font-weight: bold;">2 Stars </span><meter id="disk_c_2" value="{{$twoPer}}" min="0" max="10">{{$twoPer}}</meter><span style="font-weight: bold;"> {{$twoPer}}%</span><br/>
                        <span style="font-weight: bold;">1 Stars </span><meter id="disk_c_2" value="{{$onePer}}" min="0" max="10">{{$onePer}}</meter><span style="font-weight: bold;"> {{$onePer}}%</span><br/>
                    </div>
                    <hr>
                    @if(count($product->activeReviews))
                    @foreach($product->activeReviews as $review)
                    <div class="media mb-3">

                        <div class="media-body">
                            <div class="stars">
                                @for ($i = 1; $i < 6; $i++)
                                <span class="fa fa-star star-{{$i > $review->rate ? 'empty' : 'filled'}}"></span>
                                @endfor

                            </div>
                            <p>{{$review->description}}</p>
                            <small class="text-muted">Posted {{$review->created_at->diffForHumans()}} by <strong>{{$review->user->name}}</strong></small>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    @else
                    <h2>No reviews found for this product, be the first.</h2>
                    <hr>
                    @endif
                    <a href="#" class="btn hvr-hover" data-toggle="modal" data-target="#leave-review-modal" >Leave a review</a>

                </div>

            </div>

        </div>


    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="leave-review-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{route('website.products.submit_review', $product->id)}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Leave a review</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (Auth::check())
                    Rate:
                    <section class="rating-widget">
                        <!-- Rating Stars Box -->
                        <div class="rating-stars text-center">
                            <ul id="stars">
                                <li class="star" data-value="1">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" data-value="2">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" data-value="3">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" data-value="4">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star" data-value="5">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="rate">
                    </section>
                    Description:
                    <div class="form-group">
                        <textarea class="form-control" name='description' rows="3"></textarea>
                    </div>
                    @else
                    <h2>Please login to submit review.</h2>

                    @endif
                </div>
                <div class="modal-footer">
                    @if (Auth::check())
                    <button type="submit" class="btn hvr-hover">Submit</button>
                    @else
                    <button type="submit" class="btn  hvr-hover">Login</button>

                    @endif
                </div>
            </div>
        </form>
    </div>

</div>
@endsection

