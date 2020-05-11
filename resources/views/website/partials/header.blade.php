<!-- Start Main Top -->
<header class="main-header">
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-default bootsnav">
    <div class="container">
      <!-- Start Header Navigation -->
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('website/images/logo.png')}}" class="logo" alt=""></a>
      </div>
      <!-- End Header Navigation -->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
          <li class="nav-item"><a class="nav-link" href="{{url('/')}}">HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('website.products.index')}}">SHOP</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('website.contact-us.index')}}">CONTACT US</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#delivery-schedule-modal">DELIVERY SCHEDULE</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->

      <!-- Start Atribute Navigation -->
      <div class="attr-nav">
        <ul>
          <li class="side-menu side-menu-user">
            <a href="#"><i class="fa fa-user"></i></a>
            <ul>
              @if (Auth::guest())
              <li><a href="{{route('website.login')}}">LOGIN</a></li>
              <li><a href="{{route('website.register')}}">REGISTER</a></li>
              @else
              <li><a href="{{route('website.orders.index')}}">MY ORDERS</a></li>
              <li><a href="{{route('website.profile.edit')}}">EDIT PROFILE</a></li>
              <li>
                <a href="{{route('website.logout')}}" onclick="submitLogoutForm(event)">LOGOUT</a>
                <form id="logout-form" method="POST" action="{{ route('website.logout') }}" style="display: none;">
                  @csrf
                </form>
              </li>
              @endif
            </ul> 
          </li>
          {{-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li> --}}
          <li class="side-menu side-menu-cart">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span class="badge">
                {{$cart['total_number_of_items'] ?? 0}}
              </span>
            </a>
          </li>
        </ul>
      </div>
      <!-- End Atribute Navigation -->
    </div>
    <!-- Start Side Menu -->
    <div class="side">
      <a href="#" class="close-side"><i class="fa fa-times"></i></a>
      <li class="cart-box">
        <ul class="cart-list">
          @if(isset($cart['items']) && count($cart['items']))
            @foreach($cart['items'] as $id => $item)
              <li>
                <a href="#" class="photo"><img src="{{asset($item['image_url'])}}" class="cart-thumb" alt="" /></a>
                <h6>
                  <a href="{{route('website.products.show',['id' => $id, 'slug' => Illuminate\Support\Str::slug($item['name'])])}}">{{$item['name']}}</a>
                  <br>
                  Price: EGP {{moneyFormat($item['price_per_item'])}}
                  <br>
                  Qty: {{$item['quantity']}}
                </h6>
                <h5>Total: EGP {{moneyFormat($item['sub_total_per_product'])}}</h5>
              </li>
            @endforeach
          @else
          <li>
          <h6><a href="#">Cart is empty </a></h6>
          </li>
          @endif
        
          <li class="total">
            <div class="mb-3"><strong>Sub Total</strong>:EGP {{moneyFormat($cart['sub_total'] ?? 0)}}</div>
            <a href="{{route('website.carts.view')}}" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
          </li>
        </ul>
      </li>
    </div>
    <!-- End Side Menu -->
  </nav>
  <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Delivery schedule modal  -->
<div class="modal fade" id="delivery-schedule-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Delivery schedule</h3>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> No more “I can’t find it” - We are one click away, delivering to your door step. LifeSnacks facilitated ordering your favorite snacks online through our website.</p>
        <p class="font-weight-bold">Your order will arrive accordingly (We only deliver to Cairo & Giza)</p>
        <ul>
          <li><strong>New Cairo</strong> delivery within 24hrs</li> 
          <li><strong>Heliopolis</strong> delivery within 24hrs</li>
          <li><strong>The rest of Cairo &amp; Giza</strong> delivery within 48hrs</li>
        </ul>
        <p class="font-weight-bold">We may need to confirm your order by phone and schedule your suitable delivery time</p>
        <p>You can reach us by phone Saturday to Thursday from 9am to 5pm. Outside our phone hours, kindly send us an e-mail to customercare@lifesnacks.me</p>
      </div>
    </div>
  </div>
</div>
<!-- End Delivery schedule modal  -->