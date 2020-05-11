@extends('website.layouts.app')

@section('title','Shop')

@section('content')

<!-- Start Contact Us  -->
<div class="contact-box-main">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-all text-center">
          <h1>Contact us</h1>
          <p></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <div class="contact-form-right">
          <h2>GET IN TOUCH</h2>
          <form class="old-form" action="{{route('website.contact-us.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" placeholder="Email" name="email" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control" name="message" placeholder="Message" rows="3"></textarea>
                </div>
                <div class="submit-button text-center">
                  <button class="btn hvr-hover">Send Message</button>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6 col-sm-12">
        <div class="contact-info-left">
          <h2>CONTACT INFO</h2>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13826.198030204741!2d31.4772033654018!3d29.963633998959743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458237fde474bdf%3A0x392f97d7e526bf88!2sThe%20Industrial%20Zone%2C%20Industrial%20Area%2C%20Third%20New%20Cairo%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1587164174595!5m2!1sen!2seg" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          <ul>
            <li>
              <p><i class="fas fa-map-marker-alt"></i>Address:  Factory #313 Industrial Zone <br>Third Settlement,<br> New Cairo </p>
            </li>
            <li>
              <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+20225738040">+20 2 2573 8040</a></p>
            </li>
            <li>
              <p><i class="fas fa-envelope"></i>Email: <a href="mailto:customercare@lifensnacks.me">customercare@lifensnacks.me</a></p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Cart -->

@endsection

@section('js')

@if($errors->any())
@include('website.partials.js.old')
@endif

@endsection