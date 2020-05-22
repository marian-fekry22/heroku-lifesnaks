@extends('website.layouts.app')

@section('title','Login')

@section('content')
<div class="container">
    <div class="row account-login">
        <div class="col-md-6 mb-5 mt-5 mx-auto">
            <div class="title-left">
                <h3>Account Login</h3>
            </div>
            <form class="mt-3 review-form-box old-form" action="{{route('website.login')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="mb-0">Email</label>
                        <input type="text" name="email" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mb-0">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn hvr-hover">Login</button>
                Don't have an account? <a href="{{route('website.register')}}">Signup</a>
                <br> 
                 <a href="{{route('website.password.request')}}">Forgot/Reset password</a>
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