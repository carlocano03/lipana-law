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

        var tableHome = $('#table_home').DataTable({
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
                "url": "<?= base_url('WebsiteSettings/getHome') ?>",
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

        var tableAttorney = $('#table_attorneys').DataTable({
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
                "url": "<?= base_url('WebsiteSettings/getAttorney') ?>",
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
                    $('#addAbout').trigger('reset');
                    $('#modalAbout').modal('hide');
                    tableAbout.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('submit', '#addHome', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/addHome' ?>",
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
                    $('#addHome').trigger('reset');
                    $('#modalHome').modal('hide');
                    tableHome.draw();
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
                    $('#addPracticeArea').trigger('reset');
                    $('#modalPracticeArea').modal('hide');
                    tablePracticeArea.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('submit', '#addAttorney', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/addAttorney' ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire(
                        'Thank you!',
                        'Attorney successfully added.',
                        'success'
                    );
                    $('#addAttorney').trigger('reset');
                    $('#modalAttorney').modal('hide');
                    tableAttorney.draw();
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

        $(document).on('click', '.delete_attroney', function() {
            var attorneyID = $(this).attr('id');
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
                        url: "<?= base_url('WebsiteSettings/deleteAttorney') ?>",
                        method: "POST",
                        data: {
                            attorneyID: attorneyID
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.message == 'Success') {
                                Swal.fire(
                                    'Thank you!',
                                    'Attorney successfully deleted.',
                                    'success'
                                );
                                tableAttorney.draw();
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
        $('#update_image').hide('300');
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
                    $('#year').val(data.year);
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
                    $('#update_image').show('300');
                    $('#about_image').prop('required', true);
                    break;
            
                default:
                    $('#update_video').hide('300');
                    $('#inpFile').prop('required', false);
                    $('#update_image').hide('300');
                    $('#about_image').prop('required', false);
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

        $(document).on('click', '.update_home', function() {
            var homeID = $(this).attr('id');
            $.ajax({
                url:"<?= base_url('WebsiteSettings/getHomeData')?>",
                method:"POST",
                data:{homeID:homeID},
                dataType:"json",
                success:function(data) {
                    $('#modalEditHome').modal('show');
                    $('#home_id').val(homeID);

                    $('#why_select_us').val(data.why_select_us);
                    $('#section_one_title').val(data.section_one_title);
                    $('#sec_one_desc').text(data.sec_one_desc);
                    $('#section_two_title').val(data.section_two_title);
                    $('#sec_two_desc').text(data.sec_two_desc);
                    $('#section_three_title').val(data.section_three_title);
                    $('#sec_three_desc').text(data.sec_three_desc);
                }
            });
        });

        $(document).on('submit', '#updateHome', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/updateHome' ?>",
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
                    $('#modalEditHome').modal('hide');
                    $('#updateHome').trigger('reset');
                    tableHome.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $('#update_serviceImg').hide('300');
        $('#update_attorneyImg').hide('300');
        $(document).on('click', '.update_service', function() {
            var serviceID = $(this).attr('id');
            $.ajax({
                url:"<?= base_url('WebsiteSettings/getServiceData')?>",
                method:"POST",
                data:{serviceID:serviceID},
                dataType:"json",
                success:function(data) {
                    $('#modalServiceUpdate').modal('show');
                    $('#service_id').val(serviceID);

                    $('#title').val(data.title);
                    $('#short_desc').val(data.short_desc);
                }
            });
        });

        $(document).on('change', '#update_services', function() {
            var trans = $(this).val();
            switch (trans) {
                case '2':
                    $('#update_serviceImg').show('300');
                    $('#inpFile').prop('required', true);
                    break;
            
                default:
                    $('#update_serviceImg').hide('300');
                    $('#inpFile').prop('required', false);
                    break;
            }
        });

        $(document).on('change', '#update_attroney', function() {
            var trans = $(this).val();
            switch (trans) {
                case '2':
                    $('#update_attorneyImg').show('300');
                    $('#inpFile').prop('required', true);
                    break;
            
                default:
                    $('#update_attorneyImg').hide('300');
                    $('#inpFile').prop('required', false);
                    break;
            }
        });

        $(document).on('submit', '#updateServices', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/updateServices' ?>",
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
                    $('#modalServiceUpdate').modal('hide');
                    $('#updateServices').trigger('reset');
                    tableServices.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('click', '.update_practice', function() {
            var practice_id = $(this).attr('id');

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/getPA_data' ?>",
                method: "POST",
                dataType: "json",
                data: {
                    practice_id: practice_id,
                },
                success: function(data) {
                    $('#modalEditPracticeArea').modal('show');
                    $('#practice_id').val(practice_id);
                    $('#title').val(data.title);
                    $('#short_desc').val(data.short_desc);
                }
            })
        });

        $(document).on('submit', '#editPracticeArea', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/editPracticeArea' ?>",
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
                    $('#modalEditPracticeArea').modal('hide');
                    $('#editPracticeArea').trigger('reset');
                    tablePracticeArea.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        $(document).on('click', '.update_attroney', function() {
            var attorney_id = $(this).attr('id');

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/getAttorney_data' ?>",
                method: "POST",
                dataType: "json",
                data: {
                    attorney_id: attorney_id,
                },
                success: function(data) {
                    $('#modalEditAttorney').modal('show');
                    $('#attorney_id').val(attorney_id);
                    $('#name').val(data.name);
                    $('#practice_areas').val(data.practice_areas);
                    $('#quotes').val(data.quotes);
                }
            })
        });

        $(document).on('submit', '#updateAttorney', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                url: "<?= base_url() . 'WebsiteSettings/updateAttorney' ?>",
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
                    $('#modalEditAttorney').modal('hide');
                    $('#updateAttorney').trigger('reset');
                    tableAttorney.draw();
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong. Please try again later!', 'error');
                }
            });
        });

        
    });
</script>