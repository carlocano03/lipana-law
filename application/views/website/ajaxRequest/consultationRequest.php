<script>
    $(document).on('submit', '#consultation', function(event) {
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
                Swal.fire('Thank you!', 'Consultation successfully submitted. Please wait for the response attorney.', 'success');
                $('#consultation').trigger('reset');
            },
            error:function()
            {
                Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
            }
        });
    });

    $(document).on('submit', '#legalAdvice', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        $.ajax({
            url:"<?= base_url('home/sendlegalAdvice')?>",
            method:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data)
            {
                Swal.fire('Thank you!', 'Successfully submitted. Please wait for the response of attorney.', 'success');
                $('#modalAdvice').modal('hide');
                $('#legalAdvice').trigger('reset');
            },
            error:function()
            {
                Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
            }
        });
    });
</script>