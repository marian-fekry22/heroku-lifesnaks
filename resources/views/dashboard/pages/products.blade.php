@extends('dashboard.layouts.app')

@section('title','Product')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Product
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Product</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  
  @if(isset($product))
  <form id="main_form" class="old-form values-form" action="{{route('dashboard.products.update',$product->id)}}" method="POST">
    @csrf
    @method('PATCH')

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit: {{$product->name}}</h3>

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
              <label>Price</label>
              <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" rows="4" placeholder="Description"></textarea>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
    <!-- /.box -->
  </form>
  @endif

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Product list</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="products-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $oneProduct)
          <tr>
            <th>{{$oneProduct->id}}</th>
            <th><img width="100" src="{{asset($oneProduct->main_image_url)}}"></th>
            <th>{{$oneProduct->name}}</th>
            <th>{{$oneProduct->description}}</th>
            <th>{{$oneProduct->price}}</th>
            <th><a href="{{route('dashboard.products.edit',$oneProduct->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></th>
          </tr>
          @endforeach
        </tbody>
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
@elseif(isset($product))
@include('dashboard.partials.js.values', ['values' => $product] )
@endif

<script>

  $('#products-table').DataTable({
    scrollX: true,
    autoWidth: false,
    processing: true,
    order: [[0, 'asc']]
  });

</script>

@endsection
