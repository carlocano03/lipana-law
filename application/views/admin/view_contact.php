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
                    <i class="fas fa-envelope me-2"></i>Contact Us Reports
                </div>
                <div class="card-body">
                    <p class="fw-bold">Subject: <?= isset($contact->contact_subject) ? $contact->contact_subject : '' ?><span class="badge bg-secondary ms-2">Inbox</span></p>
                    <hr>
                    <div class="message-section">
                        <div class="row">
                            <div class="col-md-6 profile-img">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('assets/img/avatar.png')?>" alt="" class="rounded-circle me-2">
                                    <span><b><?= isset($contact->contact_name) ? $contact->contact_name : '' ?></b><br>
                                        <span style="font-size:13px; font-style:italic;"><?= isset($contact->contact_email) ? $contact->contact_email : '' ?></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                            <?php
                                $date = isset($contact->date_created) ? $contact->date_created : '';
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
                                <?= isset($contact->contact_message) ? $contact->contact_message : '' ?>
                            </p>
                            <a href="<?= base_url('main/contactUs')?>" class="btn btn-danger btn-sm"><i class="bi bi-backspace-fill me-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>