<script>
  var old = @json(old());

  $('.old-form textarea.form-control, .old-form input[type="text"].form-control').each(function() {
    if ($(this).data('datepicker')) {
      $(this).datepicker('setDate', old[$(this).attr("name")]);
    } else {
      $(this).val(old[$(this).attr("name")]);
    }
  });
  $('.old-form select:not([multiple]).form-control').each(function() {
    $(this).val(old[$(this).attr("name")]).trigger('change.select2');
  });
  $('.old-form select[multiple].form-control').each(function() {
    $(this).val(old[$(this).attr("name").replace('[]','')]).trigger('change.select2');
  });
  $('.old-form input[type="checkbox"].form-control, .old-form input[type="radio"].form-control').each(function() {
    $(this).attr('checked', old[$(this).attr("name")] === $(this).val());
  });
</script>
