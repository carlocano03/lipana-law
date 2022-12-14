<!-- <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('webAssets/images/testBG.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Practice Areas</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Practice Areas <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section> -->

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="text-center ">
            <h1 class="mb-3 text-white header-title">Practice Areas</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Practice Areas <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
        <div class="row d-flex justify-content-center">

            <?php foreach ($areas as $row) : ?>
                <div class="col-md-3 text-center">
                    <div class="practice-area ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-auction"></span>
                        </div>
                        <h3><a href="#"><?= $row->practice_title; ?></a></h3>
                        <p><?= $row->short_desc; ?></p>
                        <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                    </div>
                </div>
            <?php endforeach; ?>


            <!-- <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-auction"></span>
                    </div>
                    <h3><a href="practice-single.html">Business Law</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-shield"></span>
                    </div>
                    <h3><a href="practice-single.html">Insurance Law</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-handcuffs"></span>
                    </div>
                    <h3><a href="practice-single.html">Criminal Law</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-house"></span>
                    </div>
                    <h3><a href="practice-single.html">Property Law</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-employee"></span>
                    </div>
                    <h3><a href="practice-single.html">Employment Law</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-fire"></span>
                    </div>
                    <h3><a href="practice-single.html">Fire Accident</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-money"></span>
                    </div>
                    <h3><a href="practice-single.html">Financial Law</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-medicine"></span>
                    </div>
                    <h3><a href="practice-single.html">Drug Offenses</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-handcuffs"></span>
                    </div>
                    <h3><a href="practice-single.html">Sexual Offenses</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div> -->
        </div>
    </div>
</section>