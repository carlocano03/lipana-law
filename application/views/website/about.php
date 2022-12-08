<!-- <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('webAssets/images/testBG.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">About Us</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section> -->

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="text-center ">
            <h1 class="mb-3 text-white text-center header-title">About Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end" style="background-image:url(<?= base_url('webAssets/images/about-img.jpg') ?>);">
                    <a href="<?= base_url('uploaded_file/corporateVideo/') ?><?= $about->corporate_video ?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start pt-3 pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Welcome to Lipana Law</span>
                        <h2 class="mb-4"><?= isset($about->title) ? $about->title : '' ?></h2>
                        <p>
                            <?= isset($about->about_desc) ? $about->about_desc : '' ?>
                        </p>
                        <div class="tabulation-2 mt-4">
                            <ul class="nav nav-pills nav-fill d-md-flex d-block">
                                <li class="nav-item mb-md-0 mb-2">
                                    <a class="nav-link active py-2" data-toggle="tab" href="#home1">Our Mission</a>
                                </li>
                                <li class="nav-item px-lg-2 mb-md-0 mb-2">
                                    <a class="nav-link py-2" data-toggle="tab" href="#home2">Our Vision</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 mb-md-0 mb-2" data-toggle="tab" href="#home3">Our
                                        Value</a>
                                </li>
                            </ul>
                            <div class="tab-content bg-light rounded mt-2">
                                <div class="tab-pane container p-0 active" id="home1">
                                    <p>
                                        <?= isset($about->mission) ? $about->mission : '' ?>
                                    </p>
                                </div>
                                <div class="tab-pane container p-0 fade" id="home2">
                                    <p>
                                        <?= isset($about->vision) ? $about->vision : '' ?>
                                    </p>
                                </div>
                                <div class="tab-pane container p-0 fade" id="home3">
                                    <p>
                                        <?= isset($about->our_values) ? $about->our_values : '' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="years d-flex mt-4 mt-md-5">
                            <h4>
                                <span class="number mr-2" data-number="40">0</span>
                                <span>Years of Experienced</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="ftco-consultation ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(<?= base_url('webAssets/images/bg_2.jpg') ?>);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex justify-content-end">
        <div class="col-md-6 half p-3 py-5 pl-md-5 ftco-animate heading-section heading-section-white">
                <h2 class="mb-4">Free Consultation</h2>
                <form class="consultation" id="consultation">
                    <div class="form-group">
                        <input type="text" name="client_name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="client_email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark py-3 px-4"><i class="bi bi-send-plus-fill mr-2"></i>Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> -->