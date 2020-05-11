<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- Optionally, you can add icons to the links -->
      <li><a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
      <li><a href="{{route('dashboard.orders.index')}}"><i class="fa fa-truck"></i> <span>Orders</span></a></li>
      <li><a href="{{route('dashboard.promo-codes.index')}}"><i class="fa fa-ticket"></i> <span>Promo codes</span></a></li>
      <li><a href="{{route('dashboard.products.index')}}"><i class="fa fa-shopping-bag"></i> <span>Products</span></a></li>
      <li><a href="{{route('dashboard.reviews.index')}}"><i class="fa fa-star-half-o"></i> <span>Reviews</span></a></li>
      <li><a href="{{route('dashboard.contact-us-messages.index')}}"><i class="fa fa-envelope"></i> <span>Contact us messages</span></a></li>
      <li><a href="{{route('dashboard.change-password.index')}}"><i class="fa fa-lock"></i> <span>Change password</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>