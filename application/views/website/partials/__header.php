<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lipan Law | Lipana . Bedural . Zoreta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= base_url('webAssets/images/icon.png') ?>" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?= base_url('webAssets/css/open-iconic-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('webAssets/css/animate.css') ?>">

    <link rel="stylesheet" href="<?= base_url('webAssets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('webAssets/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('webAssets/css/magnific-popup.css') ?>">

    <link rel="stylesheet" href="<?= base_url('webAssets/css/aos.css') ?>">

    <link rel="stylesheet" href="<?= base_url('webAssets/css/ionicons.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('webAssets/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('webAssets/css/icomoon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('webAssets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('webAssets/css/custom-style.css') ?>">

    <style>
        body {
            background: #000000;
            background: -webkit-linear-gradient(to top, #434343, #000000);
            background: linear-gradient(to top, #434343, #000000);
        }
    </style>
</head>

<body>

    <nav class="navbar sticky-top px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home') ?>">Lipana Law <span>Lipana . Bedural . Zoreta</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= ($this->uri->segment(1) == '' ? 'active' : '') ?>"><a href="<?= base_url('') ?>" class="nav-link">Home</a></li>
                    <li class="nav-item <?= ($this->uri->segment(2) == 'about' ? 'active' : '') ?>"><a href="<?= base_url('home/about') ?>" class="nav-link">About</a></li>
                    <li class="nav-item <?= ($this->uri->segment(2) == 'attorneys' ? 'active' : '') ?>"><a href="<?= base_url('home/attorneys') ?>" class="nav-link">Attorneys</a></li>
                    <li class="nav-item <?= ($this->uri->segment(2) == 'practiceAreas' ? 'active' : '') ?>"><a href="<?= base_url('home/practiceAreas') ?>" class="nav-link">Practice Areas</a></li>
                    <li class="nav-item <?= ($this->uri->segment(2) == 'contact' ? 'active' : '') ?>"><a href="<?= base_url('home/contact') ?>" class="nav-link">Contact</a></li>
                    <li class="nav-item cta"><a href="#consultation" class="nav-link">Free Consultation</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->