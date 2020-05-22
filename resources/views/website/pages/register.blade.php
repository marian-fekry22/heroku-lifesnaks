@extends('website.layouts.app')

@section('title','Register')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-all pt-5 mt-3 text-center">
          <h1>Register</h1>
          <p></p>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5 mx-auto">
            <form class="mt-3 review-form-box old-form" action="{{route('website.register')}}" method="POST">
                @csrf
                <div class="title-left">
                    <h3>Basic info</h3>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="mb-0">Full name</label>
                        <input type="text" name="name" class="form-control" placeholder="Full name">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Password confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirmation">
                    </div>
                </div>
                <div class="title-left">
                    <h3>Shipping details</h3>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="mb-0">Country</label>
                        <input type="text" name="country" class="form-control" placeholder="Country">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Governorate</label>
                        <input type="text" name="governorate" class="form-control" placeholder="Governorate">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">City</label>
                        <input type="text" name="city" class="form-control" placeholder="City">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Address/Street</label>
                        <input type="text" name="address" class="form-control" placeholder="Address/Street">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Building</label>
                        <input type="text" name="building" class="form-control" placeholder="Building">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Floor</label>
                        <input type="text" name="floor" class="form-control" placeholder="Floor">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Apartment</label>
                        <input type="text" name="apartment" class="form-control" placeholder="Apartment">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Landline</label>
                        <input type="text" name="landline" class="form-control" placeholder="Landline">
                    </div>
                </div>
                <button type="submit" class="btn hvr-hover">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js')

@if($errors->any())
@include('website.partials.js.old')
@endif

@endsection