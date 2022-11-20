<script>
    function checkPasswordMatch() {
        var password = $("#yourPassword").val();
        var confirmPassword = $("#confirmPassword").val();
        if (password != confirmPassword) {
            $("#error-message").text("Passwords does not match!");
            $("#error-message").removeClass("alert alert-success");
            $("#error-message").addClass("alert alert-danger");
            $("#save_changes").attr("disabled", true);
        } else {
            $("#error-message").text("Passwords match.");
            $("#error-message").removeClass("alert alert-danger");
            $("#error-message").addClass("alert alert-success");
            $("#save_changes").attr("disabled", false);
        }
    }
    $(document).ready(function() {
        var password = $("#yourPassword").val();
        $("#confirmPassword").keyup(checkPasswordMatch);
    });
    $(document).on('keyup', '#yourPassword, #confirmPassword', function() {
        if ($(this).val() == '') {
            $("#error-message").text("");
            $("#error-message").removeClass("alert alert-danger");
            $("#error-message").removeClass("alert alert-success");
        }
    });

    $(document).on('submit', '#changePassword', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        $.ajax({
            url: "<?= base_url() . 'main/changePassword' ?>",
            method: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.message == 'Success') {
                    Swal.fire(
                        'Thank you!',
                        'Profile account successfully updated.',
                        'success'
                    );
                    setTimeout(function() {
                        window.location.href = "<?= base_url('main/logout') ?>"
                    }, 2000);
                } else {
                    Swal.fire('Error!', 'Error in updating. Please try again later.', 'warning');
                }
            },
            error: function() {
                Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
            }
        });
    });

    //Account Managment
    $(document).ready(function() {
        var tableAccount = $('#table_account').DataTable({
            language: {
                search: '',
                searchPlaceholder: "Search Here...",
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br>Loading... ',
                "info": "_START_-_END_ of _TOTAL_ entries",
                paginate: {
                    next: '<i class="fas fa-chevron-right"></i>',
                    previous: '<i class="fas fa-chevron-left"></i>'
                }
            },
            "ordering": false,
            "serverSide": true,
            "processing": true,
            "pageLength": 25,
            "ajax": {
                "url": "<?= base_url('main/get_accountData') ?>",
                "type": "POST",
                "data": function(data) {
                    data.filter_status = $('#filter_status').val();
                }
            },
        });
        $('#filter_status').change(function() {
            tableAccount.draw();
        });

        $(document).on('click', '.account_activation', function() {
            var userID = $(this).attr('id');
            if ($(this).is(":checked")) {
                $.ajax({
                    url: "<?= base_url() . 'main/account_activated' ?>",
                    type: "POST",
                    data: {
                        userID: userID
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success == 'Success') {
                            Swal.fire('Thank you!', 'Account activated.', 'success');
                            var table = $('#table_account').DataTable();
                            table.draw();
                        } else {
                            Swal.fire("Error in updating", "Clicked button to close!", "error");
                        }

                    }
                });
            } else {
                $.ajax({
                    url: "<?= base_url() . 'main/account_deactivated' ?>",
                    type: "POST",
                    data: {
                        userID: userID
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success == 'Success') {
                            Swal.fire('Thank you!', 'Account deactivated.', 'success');
                            var table = $('#table_account').DataTable();
                            table.draw();
                        } else {
                            Swal.fire("Error in updating", "Clicked button to close!", "error");
                        }
                    }
                });
            }
        });

        $(document).on('submit', '#registerAccount', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            $.ajax({
                url: "<?= base_url() . 'user/registerAccount' ?>",
                method: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.message != '') {
                        Swal.fire('Error!', 'Account already exist.', 'warning');
                    } else {
                        Swal.fire(
                            'Thank you!',
                            'Account successfully created.',
                            'success'
                        );
                        $('#modalAccount').modal('hide');
                        tableAccount.draw();
                    }
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('click', '.add_permission', function() {
            var userID = $(this).attr('id');
            $('#modalPermission').modal('show');
            $('#table_permission').DataTable({
                "ordering": false,
                "paginate": false,
                "searching": false,
                "info": false,
                "serverSide": true,
                "processing": true,
                "pageLength": 25,
                "stateSave": true,
                "bDestroy": true,
                "ajax": {
                    "url": "<?= base_url('main/get_Permission/') ?>" + userID,
                    "type": "POST"
                },
            });
        });

        $(document).on('click', '.action_session', function() {
            var perm_id = $(this).attr('id');
            var userID = $(this).data('user');
            var desc = $(this).data('desc');
            if ($(this).is(":checked")) {
                $.ajax({
                    url: "<?= base_url() . 'main/add_permission' ?>",
                    type: "POST",
                    data: {
                        userID: userID,
                        perm_id: perm_id,
                        desc: desc
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success == 'Success') {
                            var table = $('#table_permission').DataTable();
                            table.draw();
                        } else {
                            Swal.fire("Error in updating", "Clicked button to close!", "error");
                        }
                    }
                });
            } else {
                $.ajax({
                    url: "<?= base_url() . 'main/remove_permission' ?>",
                    type: "POST",
                    data: {
                        userID: userID,
                        perm_id: perm_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success == 'Success') {
                            var table = $('#table_permission').DataTable();
                            table.draw();
                        } else {
                            Swal.fire("Error in updating", "Clicked button to close!", "error");
                        }
                    }
                });
            }
        });

    });
</script>

<?php if ($_SESSION['loggedIn']['temp_pass'] != NULL) : ?>
    <script>
        $(document).ready(function() {
            $('#modalChangePass').modal('show');
        });
    </script>
<?php endif; ?>