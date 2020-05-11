@extends('dashboard.layouts.app')

@section('title','Promo code')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Promo code
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Promo code</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <form id="main_form" class="old-form values-form" action="{{isset($promoCode) ? route('dashboard.promo-codes.update',$promoCode->id) : route('dashboard.promo-codes.store')}}" method="POST">
    @csrf
    @if(isset($promoCode))
    @method('PATCH')
    <a class="btn btn-success pull-right" href="{{route('dashboard.promo-codes.index')}}"><i class="fa fa-plus"></i> New promo code</a>
    <br><br>
    @endif

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{isset($promoCode) ? 'Edit: '.$promoCode->name : 'Create new promo code'}}</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <label>Discount percentage (%)</label>
              <input type="text" name="discount_percentage" class="form-control" placeholder="Discount percentage (%)">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Is active?</label>
              <select class="form-control select2" name="is_active" data-placeholder="Is active?">
                <option></option> <!-- for the placeholder -->
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Expires in</label>
              <input type="text" name="expires_in" class="form-control date-input" placeholder="Expires in (year-month-day)">
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{isset($promoCode) ? 'Update' : 'Create'}}</button>
      </div>
    </div>
    <!-- /.box -->
  </form>

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Promo code list</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="advanced_search" class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Advanced Search</h3>
        </div>
        <!-- /.box-header -->
        <form>
          <div class="box-body">
            <div class="row">
              <div class="col-md-3 advanced-search-input">
                <input type="text" name="id" class="form-control" placeholder="ID">
              </div>
              <div class="col-md-3 advanced-search-input">
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <div class="col-md-3 advanced-search-input">
                <input type="text" name="discount_percentage" class="form-control" placeholder="Discount percentage (%)">
              </div>
              <div class="col-md-3 advanced-search-input">
                <select class="form-control select2" name="is_active" data-placeholder="Is active?">
                  <option></option> <!-- for the placeholder -->
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>

            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button class="btn btn-primary pull-right">Search</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
      <table id="promo-codes-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Discount percentage</th>
            <th>Active</th>
            <th>Expires in</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->

@endsection

@section('js')

@if($errors->any())
@include('dashboard.partials.js.old')
@elseif(isset($promoCode))
@include('dashboard.partials.js.values', ['values' => $promoCode] )
@endif

<script>

  var oTable = $('#promo-codes-table').DataTable({
    scrollX: true,
    autoWidth: false,
    processing: true,
    serverSide: true,
    order: [[0, 'desc']],
    ajax:{
      url: '{!! route('dashboard.datatable.promo-codes.index') !!}',
      data: function (d) {
        d.id = $('#advanced_search [name=id]').val();
        d.name = $('#advanced_search [name=name]').val();
        d.discount_percentage = $('#advanced_search [name=discount_percentage]').val();
        d.is_active = $('#advanced_search [name=is_active]').val();
      }
    },
    columns: [
    { data: 'id', name: 'id' },
    { data: 'name', name: 'name' },
    { data: 'discount_percentage', name: 'discount_percentage' },
    { data: 'is_active', render: function (data) { return data ? 'Yes' : 'No'; } },
    { data: 'expires_in', name: 'expires_in' },
    {
      data: 'id',
      render: function (data) {
        return '<a href="' + '{{route('dashboard.promo-codes.index')}}' + '/' + data +'/edit" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
      }
    },
    ]
  });

  $('#advanced_search form').on('submit', function(e) {
    e.preventDefault();
    oTable.draw();
  });

</script>

@endsection
