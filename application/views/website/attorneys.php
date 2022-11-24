<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('webAssets/images/testBG.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Expert Attorneys</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Attorneys <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container-fluid px-md-5">
        <div class="row d-flex justify-content-center">

            <?php foreach ($attorneys as $row) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="block-2 ftco-animate">
                        <div class="flipper">
                            <div class="front" style="background-image: url('<?= base_url('uploaded_file/attorneys/'.$row->image.'') ?>');">
                                <div class="box">
                                    <h2><?= $row->name; ?></h2>
                                    <p><?= $row->practice_area; ?></p>
                                </div>
                            </div>
                            <div class="back">
                                <!-- back content -->
                                <blockquote>
                                    <p>
                                        &ldquo; <?= $row->short_quotes; ?> &rdquo;
                                    </p>
                                </blockquote>
                                <div class="text-center" style="margin-top:170px;">
                                    <img src="<?= base_url('webAssets/images/logo.png') ?>" style="width:150px; margin-top:30px; border-radius:10px;">
                                </div>
                                <div class="author d-flex">
                                    <div class="image align-self-center">
                                        <img src="<?= base_url('uploaded_file/attorneys/' . $row->image . '') ?>" alt="">
                                    </div>
                                    <div class="name align-self-center ml-3"><?= $row->name; ?> <span class="position"><?= $row->practice_area; ?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>