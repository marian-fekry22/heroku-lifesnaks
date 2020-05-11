@extends('dashboard.layouts.app')

@section('title','Contact us messages')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Contact us messages
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Contact us messages</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Messages list</h3>
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
                <input type="text" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="col-md-3 advanced-search-input">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
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
      <table id="contact-us-messages-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Messages</th>
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

<script>

  var oTable = $('#contact-us-messages-table').DataTable({
    scrollX: true,
    autoWidth: false,
    processing: true,
    serverSide: true,
    order: [[0, 'desc']],
    ajax:{
      url: '{!! route('dashboard.datatable.contact-us-messages.index') !!}',
      data: function (d) {
        d.id = $('#advanced_search [name=id]').val();
        d.name = $('#advanced_search [name=name]').val();
        d.email = $('#advanced_search [name=email]').val();
        d.phone = $('#advanced_search [name=phone]').val();
      }
    },
    columns: [
    { data: 'id', name: 'id' },
    { data: 'name', name: 'name' },
    { data: 'email', name: 'email' },
    { data: 'phone', name: 'phone' },
    { data: 'message', name: 'message' },
    {
      data: 'destroy_route',
      render: function (data) {
        return '<form style="display: inline-block;" method="POST" action="' + data + '">' +
            '@method('DELETE')' +
            '@csrf' +
            '<button class="btn btn-danger"><i class="fa fa-trash"></i></button>' +
          '</form>';
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
