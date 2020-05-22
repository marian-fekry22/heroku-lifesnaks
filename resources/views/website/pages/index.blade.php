@extends('website.layouts.app')

@section('title','Here to fill the gap.')

@section('content')

<!-- Start Slider -->
<div id="slides-shop" class="home-section cover-slides">
  <ul class="slides-container">
    <li class="text-center">
      <img src="{{asset('website/images/slideshow/slide1.jpg')}}" alt="">
    </li>
    <li class="text-center">
      <img src="{{asset('website/images/slideshow/slide2.jpg')}}" alt="">
    </li>
    <li class="text-center">
      <img src="{{asset('website/images/slideshow/slide3.jpg')}}" alt="">
    </li>
    <li class="text-center">
      <img src="{{asset('website/images/slideshow/slide4.jpg')}}" alt="">
    </li>
    <!-- <li class="text-center">
      <img src="{{asset('website/images/slideshow/slide5.jpg')}}" alt="">
    </li> -->
    <li class="text-center">
      <img src="{{asset('website/images/slideshow/slide6.jpg')}}" alt="">
    </li>
  </ul>
  <div class="slides-navigation">
    {{-- <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a> --}}
    {{-- <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a> --}}
  </div>
</div>
<!-- End Slider -->

<!-- Start Section 2  -->
<div class="home-section-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <img src="{{asset('website/images/section-2.png')}}" alt="">
      </div>
    </div>
  </div>
</div>
<!-- End Section 2  -->

<!-- Start Blog  -->
<div class="home-section latest-blog-main">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <p class="blog-header-discount">10% OFF + FREE SHIPPING on your 1st order</h1>
            <p class="blog-header-place-order">PLACE YOUR ORDER HERE!</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12 blog-box-content">

      </div>

    </div>
  </div>
</div>
<!-- End Blog  -->
<!-- Start About Page  -->
<div class="home-section about-box-main">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-all text-center">
          <h1>About Us</h1>
          <p>We are here to fill the gap!</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12">
        <img class="img-fluid" src="{{asset('website/images/aboutus.png')}}" alt="">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-6">
        <div class="banner-frame"> <img class="img-fluid" src="{{asset('website/images/aboutHomepagePic.png')}}" alt="" />
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="noo-sh-title-top">Our <span>Mission</span></h2>
        <p><strong>LifeSnacks</strong> is aiming to be the ultimate feel-good snack provider that satisfies your empty stomach instantly in the non-guiltiest way possible, by passionately mixing some of nature’s most high quality resources and crafting a final masterpiece.</p>
        <p><strong>LifeSnacks</strong> is a company, based in Egypt, delivering to you the most premium quality ingredients snacks with a home-made authentic taste, which meet our customers’ high standards. Our purpose is to be convenient for an all day quick & healthy snack saving time and boosting energy with a delightful taste.</p>

      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h2 class="noo-sh-title-top">Our <span>Story</span></h2>
        <p>The whole story goes back to an Egyptian family who couldn’t find a fresh healthy snack with high quality and nutrients. So, they started crafting their own at their home kitchen. They’ve tried many ingredients until they settled on one with several flavors. Their story went viral between their friends, they started delivering orders per requests and this turned to a business, bought their own factory and created <strong>LIFE SNACKS! </strong></p>

      </div>
    </div>

  </div>
</div>
<!-- End About Page -->


@if(isset($instagramMedia) && count($instagramMedia))
<!-- Start Instagram Feed  -->
<div class="instagram-box">
  <div class="row m-0">
    <div class="col-lg-12">
      <div class="text-center">
        <p class="find-us-header">Follow us on Instagram</h1>
      </div>
    </div>
  </div>
  <div class="main-instagram owl-carousel owl-theme">
    @foreach($instagramMedia as $oneMedia)
    <div class="item">
      <div class="ins-inner-box">
        <img src="{{$oneMedia['thumbnail_url'] ?? $oneMedia['media_url']}}" alt="" />
        <div class="hov-in">
          <a href="{{$oneMedia['permalink']}}">
            <div class="ins-inner-box-hover-counts pull-left w-100">
              <div class="ins-inner-box-hover-comments w-50 pull-left"><i class="fa fa-heart-o"></i>{{$oneMedia['like_count'] ?? '532'}}</div>
              <div class="ins-inner-box-hover-likes w-50  pull-left"><i class="fa fa-comment-o"></i>{{$oneMedia['comments_count'] ?? '32'}}</div>
            </div>
            <div class="ins-inner-box-hover-caption pull-left w-100">{{$oneMedia['caption'] ?? 'Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption'}}</div>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif
<!-- End Instagram Feed  -->
<!-- Start Blog  -->
<div class="home-section latest-blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <p class="find-us-header">Find us in stores</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-6 text-center find-us-tops-box">
        <img class="img-fluid find-us-image" src="{{asset('website/images/Tops_Markets_logo.png')}}" alt="tops" />

      </div>
      <div class="col-md-6 col-lg-6 col-xl-6 text-center find-us-box">
        <img class="img-fluid find-us-image" src="{{asset('website/images/amazon.png')}}" alt="amazon" />

      </div>

    </div>
  </div>
</div>
<!-- End Blog  -->

@endsection