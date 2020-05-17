@extends('website.layouts.app')

@section('title','Shop')

@section('content')

<!-- Start About Us  -->

        <div id="slides-shop" class="home-section cover-slides">
            <img  style="width: 100%"  src="{{asset('website/images/aboutus-page.png')}}" alt="">
        </div>
        <div class="row" style="padding:3% ;background-color:#9CC798 ;">
            <div class="col-lg-6" style="line-height: 200%;font-size: 18px">
                <h2 class="noo-sh-title-top">Our <span>Mission</span></h2>
                <p><strong>LifeSnacks</strong> is aiming to be the ultimate feel-good snack provider that satisfies your empty stomach instantly in the non-guiltiest way possible, by passionately mixing some of nature’s most high quality resources and crafting a final masterpiece.</p><br/>
                <p><strong>LifeSnacks</strong> is a company, based in Egypt, delivering to you the most premium quality ingredients snacks with a home-made authentic taste, which meet our customers’ high standards. Our purpose is to be convenient for an all day quick & healthy snack saving time and boosting energy with a delightful taste.</p>
            </div>
            <div class="col-lg-6">
                <div class="banner-frame"> <img class="img-fluid" src="{{asset('website/images/aboutHomepagePic.png')}}" alt="" />
                </div>
            </div>
        </div>
        <!-- Start About Page  -->
        <div class="home-section about-box-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1>How It All Started</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <img class="img-fluid" src="{{asset('website/images/howstart.png')}}" alt="">
                        <p class="text-center">The whole story goes back to an Egyptian family who couldn’t find a fresh healthy snack with high quality and nutrients. So, they started crafting their own at their home kitchen. They’ve tried many ingredients until they settled on one with several flavors. Their story went viral between their friends, they started delivering orders per requests and this turned to a business, bought their own factory and created LIFE SNACKS! </p>
                    </div>
                </div>
            </div>
        </div>


        <ul>
            <li><p></p></li>
            <li><p></p></li>
            <li><p> <a href="mailto:customercare@lifensnacks.me"></a></p></li>
        </ul>

<!-- End About Us -->

@endsection

@section('js')

@if($errors->any())
@include('website.partials.js.old')
@endif

@endsection
