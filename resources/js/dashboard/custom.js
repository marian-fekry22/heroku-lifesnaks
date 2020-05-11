module.exports = function() {
    //////////////
    // Select 2 //
    //////////////
    this.select2CommonConfigs = {
        width: '100%',
        allowClear: true
    };

    this.singleSelect2Configs = {}
    this.multipleSelect2Configs = {
        closeOnSelect: false
    }

    $.extend(this.singleSelect2Configs, this.select2CommonConfigs); 
    $.extend(this.multipleSelect2Configs, this.select2CommonConfigs); 

    $('.select2:not([multiple])').select2(this.singleSelect2Configs);
    $('.select2[multiple]').select2(this.multipleSelect2Configs);
    
    ////////////
    // iCheck //
    ////////////
    $('input[type="checkbox"], input[type="radio"]').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
    });

    ////////////////
    // Datepicker //
    ////////////////
    $('.date-input').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    ////////////////
    // Datatables //
    ////////////////
    $('.datatable').DataTable();

    ////////////////////////
    // sidenav active url //
    ////////////////////////
    if ($('.sidebar-menu li:first a').attr('href') === currentRoute) {
        $('.sidebar-menu li:first a').parent().addClass('active');
    } else {
        $('.sidebar-menu li a').slice(1).each(function () {  /*slice(1) to skip first li (dashboard) as it will always match the regex*/
            var pattern = new RegExp($(this).attr('href'));
            if (pattern.test(location.href)) {
                $(this).parent().addClass('active');

                // uncomment these lines if treeview is implemented
                // var third_parent = $(this).parents().eq(2);
                // if (third_parent.hasClass('treeview')) {
                //  third_parent.addClass('active');
                // }
            }
        });
    }
}
