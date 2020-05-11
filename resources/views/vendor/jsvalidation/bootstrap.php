<script>
    jQuery(document).ready(function(){

        $("<?= $validator['selector']; ?>").each(function() {
            $(this).validate({
                errorElement: 'span',
                errorClass: 'help-block error-help-block',

                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length ||
                        element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                        error.appendTo($(element).closest('.form-group'));
                        // else just place the validation message immediately after the input
                    } else if ($(element).hasClass('select2')) {
                        error.appendTo(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // add the Bootstrap error class to the control group
                },

                <?php if (isset($validator['ignore']) && is_string($validator['ignore'])): ?>

                ignore: "<?= $validator['ignore']; ?>",
                <?php endif; ?>

                
                 // Uncomment this to mark as validated non required fields
                 unhighlight: function(element) {
                   $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                 },
                 
                success: function (element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // remove the Boostrap error class from the control group
                },

                focusInvalid: true, // do not focus the last invalid input
                <?php if (Config::get('jsvalidation.focus_on_error')): ?>
                invalidHandler: function (form, validator) {

                    if (!validator.numberOfInvalids())
                        return;

                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).offset().top
                    }, <?= Config::get('jsvalidation.duration_animate') ?>);
                    $(validator.errorList[0].element).focus();

                },
                <?php endif; ?>

                rules: <?= json_encode($validator['rules']); ?>
            });
            if (typeof values !== 'undefined' || typeof old !== 'undefined') {
                $(this).valid();
            }
        });
        $('<?= $validator['selector']; ?> .select2').on('change.select2', function () {
            $(this).valid();
        });
        $('<?= $validator['selector']; ?> .iradio_square-blue input').on('ifToggled', function(){
            $(this).valid();
        });
    });
</script>
