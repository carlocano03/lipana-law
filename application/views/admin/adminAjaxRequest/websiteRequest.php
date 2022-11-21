<script>
    $(document).ready(function() {
        var tableAbout = $('#table_about').DataTable({
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
            "stateSave": true,
            "bDestroy": true,
            "ajax": {
                "url": "<?= base_url('WebsiteSettings/getAbout') ?>",
                "type": "POST"
            },
        });

        var tableServices = $('#table_services').DataTable({
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
            "stateSave": true,
            "bDestroy": true,
            "ajax": {
                "url": "<?= base_url('WebsiteSettings/getServices') ?>",
                "type": "POST"
            },
        });

        var tablePracticeArea = $('#table_area').DataTable({
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
            "stateSave": true,
            "bDestroy": true,
            "ajax": {
                "url": "<?= base_url('WebsiteSettings/getPracticeArea') ?>",
                "type": "POST"
            },
        });

        var tableInquiry = $('#table_inquiry').DataTable({
            "fnRowCallback": function(nRow, aData, iDisplayIndex, asd) {
                if (aData[4] == 'Unread') {
                    $('td', nRow).css('background-color', 'rgba(197, 231, 232, 0.8)');
                } else {
                    $('td', nRow).css('background-color', 'transparent');
                }
            },
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
            "stateSave": true,
            "bDestroy": true,
            "ajax": {
                "url": "<?= base_url('WebsiteSettings/getInquiry') ?>",
                "type": "POST"
            },
        });
        $('#table_inquiry tbody').on('click', 'td', function() {
            var data = tableInquiry.row(this).data();
            var inquiryID = data[0];
            console.log(inquiryID);
            window.location.href = "<?= base_url('main/viewInquiry/')?>" + inquiryID;
        });

        var tableContact = $('#table_contact').DataTable({
            "fnRowCallback": function(nRow, aData, iDisplayIndex, asd) {
                if (aData[4] == 'Unread') {
                    $('td', nRow).css('background-color', 'rgba(197, 231, 232, 0.8)');
                } else {
                    $('td', nRow).css('background-color', 'transparent');
                }
            },
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
            "stateSave": true,
            "bDestroy": true,
            "ajax": {
                "url": "<?= base_url('WebsiteSettings/getContact') ?>",
                "type": "POST"
            },
        });
        $('#table_contact tbody').on('click', 'td', function() {
            var data = tableContact.row(this).data();
            var contactID = data[0];
            console.log(contactID);
            window.location.href = "<?= base_url('main/viewContact/')?>" + contactID;
        });


        $(document).on('submit', '#addAbout', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/addAbout' ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire(
                        'Thank you!',
                        'About Us successfully added.',
                        'success'
                    );
                    $('#modalAbout').modal('hide');
                    tableAbout.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('submit', '#addServices', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/addServices' ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire(
                        'Thank you!',
                        'Services successfully added.',
                        'success'
                    );
                    $('#modalServices').modal('hide');
                    tableServices.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('click', '.delete_services', function() {
            var servID = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('WebsiteSettings/deleteServices') ?>",
                        method: "POST",
                        data: {
                            servID: servID
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.message == 'Success') {
                                Swal.fire(
                                    'Thank you!',
                                    'Services successfully deleted.',
                                    'success'
                                );
                                tableServices.draw();
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                        }
                    });
                }
            })
        });

        $(document).on('submit', '#addPracticeArea', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/addPracticeArea' ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire(
                        'Thank you!',
                        'Practice Area successfully added.',
                        'success'
                    );
                    $('#modalPracticeArea').modal('hide');
                    tablePracticeArea.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('click', '.delete_practice', function() {
            var practiceID = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('WebsiteSettings/deletePractice') ?>",
                        method: "POST",
                        data: {
                            practiceID: practiceID
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.message == 'Success') {
                                Swal.fire(
                                    'Thank you!',
                                    'Practice area successfully deleted.',
                                    'success'
                                );
                                tablePracticeArea.draw();
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                        }
                    });
                }
            })
        });

        $('#update_video').hide('300');
        $(document).on('click', '.update_about', function() {
            var aboutID = $(this).attr('id');
            $.ajax({
                url:"<?= base_url('WebsiteSettings/getAboutUsData')?>",
                method:"POST",
                data:{aboutID:aboutID},
                dataType:"json",
                success:function(data) {
                    $('#modalEditAbout').modal('show');
                    $('#about_id').val(aboutID);
                    $('#title').val(data.title);
                    $('#about_us').val(data.about_us);
                    $('#mission').text(data.mission);
                    $('#vision').text(data.vision);
                    $('#values').text(data.values);
                }
            });
        });

        $(document).on('change', '#update_trans', function() {
            var trans = $(this).val();
            switch (trans) {
                case '2':
                    $('#update_video').show('300');
                    $('#inpFile').prop('required', true);
                    break;
            
                default:
                    $('#update_video').hide('300');
                    $('#inpFile').prop('required', false);
                    break;
            }
        });

        $(document).on('submit', '#updateAbout', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/updateAboutUs' ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire(
                        'Thank you!',
                        'Updated successfully.',
                        'success'
                    );
                    $('#modalEditAbout').modal('hide');
                    $('#updateAbout').trigger('reset');
                    tableAbout.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });
    });
</script>