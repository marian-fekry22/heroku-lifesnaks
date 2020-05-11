@extends('dashboard.layouts.app')

@section('title','Change password')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Change password
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Change password</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Change password</p>

      <form class="old-form" method="POST" action="{{route('dashboard.change-password.update')}}">
        @method('PATCH')
        @csrf
        <div class="form-group has-feedback">
          <input name="old_password" type="password" class="form-control" placeholder="Old password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="new_password" type="password" class="form-control" placeholder="New password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="new_password_confirmation" type="password" class="form-control" placeholder="New password confirmation">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Change password</button>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
</section>
<!-- /.content -->

@endsection
