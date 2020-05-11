@extends('dashboard.layouts.app')

@section('title','Orders')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Orders
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Orders</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Orders list</h3>
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
                <input type="text" name="order_id" class="form-control" placeholder="Order ID">
              </div>
              <div class="col-md-3 advanced-search-input">
                <input type="text" name="customer_name" class="form-control" placeholder="Customer name">
              </div>
              <div class="col-md-3 advanced-search-input">
                <input type="text" name="promo_code" class="form-control" placeholder="Promo code">
              </div>
              <div class="col-md-3 advanced-search-input">
                <select class="form-control select2" name="order_status_id" data-placeholder="Order status">
                  <option></option> <!-- for the placeholder -->
                  @foreach($orderStatuses as $orderStatus)
                  <option value="{{$orderStatus->id}}">{{$orderStatus->name}}</option>
                  @endforeach
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
      <table id="orders-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Promo code</th>
            <th>Subtotal</th>
            <th>Discount amount</th>
            <th>Delivery fees</th>
            <th>Total</th>
            <th>Payment method</th>
            <th>Order status</th>
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

  var oTable = $('#orders-table').DataTable({
    scrollX: true,
    autoWidth: false,
    processing: true,
    serverSide: true,
    order: [[1, 'desc']],
    ajax:{
      url: '{!! route('dashboard.datatable.orders.index') !!}',
      data: function (d) {
        d.order_id = $('#advanced_search [name=order_id]').val();
        d.customer_name = $('#advanced_search [name=customer_name]').val();
        d.promo_code = $('#advanced_search [name=promo_code]').val();
        d.order_status_id = $('#advanced_search [name=order_status_id]').val();
      }
    },
    columns: [

      {
        "className":      'details-control',
        "orderable":      false,
        "searchable":     false,
        "data":           null,
        "defaultContent": ''
      },

      { data: 'id', name: 'id' },
      { data: 'user.name', name: 'user.name' },
      { data: 'promo_code.name', name: 'promoCode.name' },
      { data: 'subtotal', name: 'subtotal' },
      { data: 'promo_code_discount_amount', name: 'promo_code_discount_amount' },
      { data: 'delivery_fees', name: 'delivery_fees' },
      { data: 'total', name: 'subtotal' },
      { data: 'payment_method.name', name: 'paymentMethod.name' },
      { data: 'order_status.name', name: 'orderStatus.name' },
      {
        data: 'id',

        render: function (data, type, row) {
          return '<select class="select2" data-order-id="' + data + '" data-value="' + row.order_status.id + '">' +
            @foreach($orderStatuses as $orderStatus)
            '<option value="{{$orderStatus->id}}">{{$orderStatus->name}}</option>' +
            @endforeach
          '</select>'
          ;
        }
      },
    ],
    drawCallback: function() {
      $('#orders-table .select2').select2({
        minimumResultsForSearch: Infinity
      });

      $('#orders-table .select2').each(function() {
        $(this).val($(this).data('value')).trigger('change');
      });
      $('#orders-table .select2').on('select2:selecting', function(e) {
        var currentValue = $(this).val();
        Swal.fire({
          title: "Are you sure?",
          text: "You are changing the order status",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "OK"
        }).then(result => {
          if (result.value) {
            if (currentValue !== $(this).val()) {
              $.ajax({
                url : "{{route('dashboard.orders.update_status')}}",
                type: "POST",
                context: this, // context tell ajax to use a variable out of its context 
                data : {
                  order_id : $(this).data('order-id'),
                  order_status_id : $(this).val(),
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

  // Add event listener for opening and closing details
  $('#orders-table tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = oTable.row(tr);
      var tableId = 'details-' + row.data().id;

      if (row.child.isShown()) {
          // This row is already open - close it
          row.child.hide();
          tr.removeClass('shown');
      } else {
          // Open this row
          row.child(getDetailsTemplate(row.data().id)).show();
          initTable(tableId, row.data());
          tr.addClass('shown');
          // tr.next().find('td').addClass('no-padding bg-gray');
      }
  });

  function initTable(tableId, data) {
      $('#' + tableId).DataTable({
          processing: true,
          serverSide: true,
          ajax: data.details_url,
          columns: [
              { data: 'product.id', name: 'product.id' },
              { data: 'product.name', name: 'product.name' },
              { data: 'quantity', name: 'quantity' },
              { data: 'price_per_item', name: 'price_per_item' },
          ]
      })
  }

  function getDetailsTemplate(orderId) {
    return '<table class="table details-table" id="details-' + orderId + '">' +
      '<thead>' +
        '<tr>' +
          '<th>Product ID</th>' +
          '<th>Product Name</th>' +
          '<th>Quantity</th>' +
          '<th>Price per item</th>' +
        '</tr>' +
      '</thead>' +
    '</table>'
    ;
  }

</script>

@endsection
