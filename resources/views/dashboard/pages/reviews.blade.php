@extends('dashboard.layouts.app')

@section('title','Reviews')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Reviews
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Reviews</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Reviews list</h3>
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
                <input type="text" name="review_id" class="form-control" placeholder="Review ID">
              </div>
              <div class="col-md-3 advanced-search-input">
                <input type="text" name="customer_name" class="form-control" placeholder="Customer name">
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
      <table id="reviews-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Review ID</th>
            <th>Customer Name</th>
            <th>Product name</th>
            <th>Rate</th>
            <th>Description</th>
            <th>Is active</th>
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

  var oTable = $('#reviews-table').DataTable({
    scrollX: true,
    autoWidth: false,
    processing: true,
    serverSide: true,
    order: [[0, 'desc']],
    ajax:{
      url: '{!! route('dashboard.datatable.reviews.index') !!}',
      data: function (d) {
        d.review_id = $('#advanced_search [name=review_id]').val();
        d.customer_name = $('#advanced_search [name=customer_name]').val();
        d.product_name = $('#advanced_search [name=product_name]').val();
        d.is_active = $('#advanced_search [name=is_active]').val();
      }
    },
    columns: [
      { data: 'id', name: 'id' },
      { data: 'user.name', name: 'user.name' },
      { data: 'product.name', name: 'product.name' },
      { data: 'rate', name: 'rate' },
      { data: 'description', name: 'description' },
      { data: 'is_active', render: function (data) { return data ? 'Yes' : 'No'; } },
      {
        data: 'id',

        render: function (data, type, row) {
          return '<select class="select2" data-review-id="' + data + '" data-value="' + row.is_active + '">' +
            '<option></option> <!-- for the placeholder -->' +
            '<option value="1">Activated</option>' +
            '<option value="0">Deactivated</option>' +
          '</select>'
          ;
        }
      },
    ],
    drawCallback: function() {
      $('#reviews-table .select2').select2({
        minimumResultsForSearch: Infinity
      });

      $('#reviews-table .select2').each(function() {
        $(this).val($(this).data('value')).trigger('change');
      });
      $('#reviews-table .select2').on('select2:selecting', function(e) {
        var currentValue = $(this).val();
        Swal.fire({
          title: "Are you sure?",
          text: "You are changing the review status",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "OK"
        }).then(result => {
          if (result.value) {
            if (currentValue !== $(this).val()) {
              $.ajax({
                url : "{{route('dashboard.reviews.update_is_active')}}",
                type: "POST",
                context: this, // context tell ajax to use a variable out of its context 
                data : {
                  review_id : $(this).data('review-id'),
                  is_active : $(this).val(),
                },
                success: function(data, textStatus, jqXHR)
                {
                  oTable.draw(false);
                  Swal.fire({
                    title: 'Success',
                    html: data.message,
                    type: 'success'
                  });
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  $(this).val(currentValue).trigger('change');
                  Swal.fire({
                    title: 'Error',
                    html: 'Something went wrong',
                    type: 'error'
                  });
                }
              });
            } 
          } else {
            $(this).val(currentValue).trigger('change');
          }
        });
      });
    }
  });

  $('#advanced_search form').on('submit', function(e) {
    e.preventDefault();
    oTable.draw();
  });

</script>

@endsection
