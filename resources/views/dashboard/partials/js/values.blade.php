<script>
  var values = @json( $values );
  $('.values-form textarea.form-control, .values-form input.form-control').each(function() {
    if ($(this).data('datepicker')) {
      $(this).datepicker('setDate', values[$(this).attr("name")]);
    } else {
      $(this).val(values[$(this).attr("name")]);
    }
  });
  $('.values-form select:not([multiple]).form-control').each(function() {
    $(this).val(values[$(this).attr('name')]).trigger('change.select2');
  });
  $('.values-form select[multiple].form-control').each(function() {
    // using normalization way
    $(this).val(values[$(this).attr('name').replace('[]','')]).trigger('change.select2');
    
    // using relation object way
    // var relation  = values[$(this).attr('name').replace('_ids[]','')];
    // $(this).val(relation.map(array => array['id'])).trigger('change.select2');
  });
</script>
