<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="<?= base_url('assets/img/icon.png') ?>" rel="icon">
    <title>LIPANA LAW</title>
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom-style.css') ?>" rel="stylesheet" />

    <style>
        #inputGroupPrepend {
            background: none;
        }

        #inputGroupPrepend i {
            font-size: 20px;
            color: #636e72;
        }

        #yourPassword,
        #confirmPassword {
            border-left: none;
        }

        #yourPassword:focus,
        #confirmPassword:focus {
            box-shadow: none;
        }
    </style>
</head>

<body class="sb-nav-fixed" onload="startTime()">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: rgba(0, 13, 8, 1);">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= base_url('main') ?>">LIPANA-LAW</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i></button>

        <!-- <div class="d-none d-md-inline-block form-inline order-1 order-lg-0 me-4 me-lg-0 text-white ms-2">IVDMD</div> -->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>

        <!-- Navbar-->
        <!-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill"></i>
                    <span class="position-absolute top-20 start-90 translate-middle badge rounded-pill bg-danger">
                        1
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li class="text-center text-muted">You have 1 notification</li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>

                    <li class="dropdown-item">
                        <i class="bi bi-bell-fill"></i>
                        <p>Hello World</p>
                    </li>
                </ul>
            </li>
        </ul> -->
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-center">
                            <img src="<?= base_url('assets/img/avatar.png') ?>" alt="Avatar Image">
                            <div class="avatar-text"><?= $_SESSION['loggedIn']['username']; ?></div>
                            <div class="avatar-text mb-1"><?= $_SESSION['loggedIn']['fullname']; ?></div>
                            <a href="<?= base_url('main/logout') ?>" class="logout-btn"><i class="bi bi-power me-1"></i>Logout</a>
                        </div>
                        <hr class="mt-0" style="background: #474787;">
                        <a class="nav-link <?= ($this->uri->segment(2) == '' ? 'active' : '') ?>" href="<?= base_url('main') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <?php foreach ($permissions as $row) : ?>

                            <?php if ($row->permissions == "Account Management") { ?>
                                <a class="nav-link <?= ($this->uri->segment(2) == 'accountManagement' ? 'active' : '') ?>" href="<?= base_url('main/accountManagement') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                    Account Management
                                </a>
                            <?php } ?>

                        <?php endforeach; ?>

                        <span class="nav-heading text-muted">Website Settings</span>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                            Website
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse <?= ($this->uri->segment(2) == 'about' || $this->uri->segment(2) == 'services'  ? 'show' : '') ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                <?php foreach ($permissions as $row) : ?>
                                    <?php if ($row->permissions == "About Us") : ?>
                                        <a class="nav-link <?= ($this->uri->segment(2) == 'about' ? 'active' : '') ?>" href="<?= base_url('main/about')?>"><i class="fas fa-info-circle me-2"></i>About Us</a>
                                    <?php endif; ?>
                                    <!-- <?php if ($row->permissions == "Mission/Vision & Values") : ?>
                                        <a class="nav-link" href="mission_vission.html"><i class="fas fa-folder-open me-2"></i>Mission/Vision & Values</a>
                                    <?php endif; ?>
                                    <?php if ($row->permissions == "Corporate Video") : ?>
                                        <a class="nav-link" href="corporate.html"><i class="fas fa-photo-video me-2"></i>Corporate Video</a>
                                    <?php endif; ?> -->
                                    <?php if ($row->permissions == "Services") : ?>
                                        <a class="nav-link <?= ($this->uri->segment(2) == 'services' ? 'active' : '') ?>" href="<?= base_url('main/services')?>"><i class="fas fa-list me-2"></i>Services</a>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </nav>
                        </div>


                        <?php foreach ($permissions as $row) : ?>

                            <?php if ($row->permissions == "Practice Area") { ?>
                                <span class="nav-heading text-muted">Attorney</span>
                                <a class="nav-link <?= ($this->uri->segment(2) == 'practiceAreas' ? 'active' : '') ?>" href="<?= base_url('main/practiceAreas')?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                    Practice Area
                                </a>
                            <?php } ?>

                        <?php endforeach; ?>

                        <?php foreach ($permissions as $row) : ?>

                            <?php if ($row->permissions == "Inquiry Reports") { ?>
                                <span class="nav-heading text-muted">Reports</span>
                                <a class="nav-link <?= ($this->uri->segment(2) == 'inquiry' || $this->uri->segment(2) == 'viewInquiry' ? 'active' : '') ?>" href="<?= base_url('main/inquiry')?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                    Inquiry Reports
                                </a>
                            <?php } ?>
                            <?php if ($row->permissions == "Contact Us Reports") { ?>
                                <a class="nav-link <?= ($this->uri->segment(2) == 'contactUs' || $this->uri->segment(2) == 'viewContact' ? 'active' : '') ?>" href="<?= base_url('main/contactUs')?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                    Contact Us Reports
                                </a>
                            <?php } ?>

                        <?php endforeach; ?>





                    </div>
                </div>
            </nav>
        </div>