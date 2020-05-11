@if($errors->any())
<script>
    Swal.fire({
        title: '@lang('Please enter valid data')',
        html: '{!! implode('<br>',$errors->all()) !!}',
        type: 'error'
    })
</script> 
@endif

@if (session('success'))
<script>
    Swal.fire({
        title: 'Success',
        html: '{{ session('success') }}',
        type: 'success'
    })
</script>
@elseif (session('error'))
    <script>
        Swal.fire({
            title: 'Error',
            html: '{{ session('error') }}',
            type: 'error'
        })
    </script>
@elseif (session('info'))
    <script>
        Swal.fire({
            title: 'Info',
            html: '{{ session('info') }}',
            type: 'info'
        })
    </script>
@endif

<script>
    $(document).on('click', 'form:has(input[value="DELETE"]):not(".no-confirm") button', function( e ) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: $(this).data('message') || "You will not be able to undo this action!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.value) $(this).closest('form').submit();
        });
    });
</script>
