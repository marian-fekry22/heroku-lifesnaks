<script>
  var old = @json(old());

  $('.old-form textarea, .old-form input[type="text"]').each(function() {
    if ($(this).data('datepicker')) {
      $(this).datepicker('setDate', old[$(this).attr("name")]);
    } else {
      $(this).val(old[$(this).attr("name")]);
    }
  });
  $('.old-form select:not([multiple])').each(function() {
    $(this).val(old[$(this).attr("name")]).trigger('change.select2');
  });
  $('.old-form select[multiple]').each(function() {
    $(this).val(old[$(this).attr("name").replace('[]','')]).trigger('change.select2');
  });
  $('.old-form input[type="checkbox"], .old-form input[type="radio"]').each(function() {
    $(this).attr('checked', old[$(this).attr("name")] === $(this).val()).iCheck('update');
  });
</script>
