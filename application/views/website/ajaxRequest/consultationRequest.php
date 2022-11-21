<script>
    $(document).on('submit', '.consultation', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        $.ajax({
            url:"<?= base_url('home/sendConsultation')?>",
            method:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data)
            {
                Swal.fire('Thank you!', 'Consultation successfully submitted. Please wait for the response.', 'success');
                $('.consultation').trigger('reset');
            },
            error:function()
            {
                Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
            }
        });
    });
</script>