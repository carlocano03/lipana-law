<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span id="date"></span></li>
                <li class="breadcrumb-item"><span id="clock"></span></li>
            </ol>

            <div class="card">
                <div class="card-header" style="background:#2d3436; color: #fff;">
                    <i class="fas fa-archive me-2"></i>Inquiry Reports
                </div>
                <div class="card-body">
                    <p class="fw-bold">Subject: <?= isset($inquiry->subject) ? $inquiry->subject : '' ?><span class="badge bg-secondary ms-2">Inbox</span></p>
                    <hr>
                    <div class="message-section">
                        <div class="row">
                            <div class="col-md-6 profile-img">
                                <div class="d-flex">
                                    <img src="<?= base_url('assets/img/avatar.png') ?>" alt="" class="rounded-circle me-2">
                                    <span><b><?= isset($inquiry->name_client) ? $inquiry->name_client : '' ?></b><br>
                                        <span style="font-size:13px; font-style:italic;"><?= isset($inquiry->client_email) ? $inquiry->client_email : '' ?></span><br>
                                        <span style="font-size:13px; font-style:italic;"><?= isset($inquiry->contact_no) ? $inquiry->contact_no : '' ?></span><br>
                                        <span style="font-size:13px;"><?= isset($inquiry->address) ? $inquiry->address : '' ?></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <?php
                                $date = isset($inquiry->date_created) ? $inquiry->date_created : '';
                                if ($date == '')
                                    $dateFormat = '';
                                else
                                    $dateFormat = date('D M j, Y h:i a', strtotime($date));
                                ?>
                                <span style="font-size:13px;"><?= isset($dateFormat) ? $dateFormat : '' ?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="container">
                            <h5>Message:</h5>
                            <p>
                                <?= isset($inquiry->message) ? $inquiry->message : '' ?>
                            </p>
                            <a href="<?= base_url('main/inquiry')?>" class="btn btn-danger btn-sm"><i class="bi bi-backspace-fill me-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>