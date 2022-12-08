<style>
    #hero-img {
        background-image: url('webAssets/images/landing-page.jpg');
    }

    @media only screen and (max-width: 768px) {
        #hero-img {
            background-image: url('webAssets/images/about-img.jpg');
        }
    }
    @media only screen and (max-width: 820px) {
        #hero-img {
            background-image: url('webAssets/images/about-img.jpg');
        }
    }
    @media only screen and (max-width: 912px) {
        #hero-img {
            background-image: url('webAssets/images/about-img.jpg');
        }
    }
</style>
<div class="hero-wrap js-fullheight" id="hero-img" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate">
                <h1>Attorneys Fighting For Your
                    <span class="txt-rotate" data-period="2000" data-rotate='[ "Freedom.", "Rights.", "Case.", "Custody." ]'></span>
                </h1>
                <!-- <h1 class="mb-4">Attorneys Fighting For Your Freedom</h1> -->
                <p class="mb-4">Welcome to Lipana.Bedural.Zoreta Law Office, we provide and fight for your cases.</p>
                <p><a href="#modalAdvice" data-toggle="modal" class="btn btn-primary mr-md-4 py-2 px-4">Get Legal Advice <span class="ion-ios-arrow-forward"></span></a></p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 py-5">
                <div class="heading-section ftco-animate">
                    <span class="subheading">Services</span>
                    <h2 class="mb-4">Why Select Us?</h2>
                    <p>
                        <?= isset($home->why_select_us) ? $home->why_select_us : '' ?>
                    </p>
                    <p><a href="#" class="btn btn-primary py-3 px-4">Free Consultation</a></p>
                </div>
            </div>
            <div class="col-lg-9 services-wrap px-4 pt-5">
                <div class="row pt-md-3">
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="services text-center">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="flaticon-auction"></span>
                            </div>
                            <div class="text">
                                <h3><?= isset($home->sec_one_title) ? $home->sec_one_title : '' ?></h3>
                                <p>
                                    <?= isset($home->sec_one_desc) ? $home->sec_one_desc : '' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="services text-center">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="flaticon-auction"></span>
                            </div>
                            <div class="text">
                                <h3><?= isset($home->sec_two_title) ? $home->sec_two_title : '' ?></h3>
                                <p>
                                    <?= isset($home->sec_two_desc) ? $home->sec_two_desc : '' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="services text-center">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="flaticon-auction"></span>
                            </div>
                            <div class="text">
                                <h3><?= isset($home->sec_three_title) ? $home->sec_three_title : '' ?></h3>
                                <p>
                                    <?= isset($home->sec_three_desc) ? $home->sec_three_desc : '' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end" style="background-image:url(webAssets/images/about-img.jpg);">
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

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-4">Our Services Offered</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-case owl-carousel ftco-owl">
                    <?php foreach ($services as $row) : ?>
                        <div class="item">
                            <?php if ($row->service_image == NULL) : ?>
                                <div class="case img d-flex align-items-center justify-content-center" style="background-image: url(<?= base_url('webAssets/images/logo.png') ?>);">
                                <?php else : ?>
                                    <div class="case img d-flex align-items-center justify-content-center" style="background-image: url(<?= base_url('uploaded_file/services/' . $row->service_image . '') ?>);">
                                    <?php endif; ?>
                                    <div class="text text-center p-3">
                                        <h3><a href="#"><?= isset($row->service_title) ? $row->service_title : '' ?></a></h3>
                                        <div class="short-desc" style="background: #fff; padding:5px; border-radius:10px;">
                                            <span style="color:#3498db"><?= isset($row->short_desc) ? $row->short_desc : '' ?></span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                </div>
            </div>
        </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container-fluid px-md-5">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Our Attorney</span>
                <h2 class="mb-4">Our Legal Attorneys</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">

            <?php foreach ($attorneys as $row) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="block-2 ftco-animate">
                        <div class="flipper">
                            <div class="front" style="background-image: url('<?= base_url('uploaded_file/attorneys/' . $row->image . '') ?>');">
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


<section class="ftco-consultation ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(webAssets/images/bgcontact.jpg);" id="consultation">
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
</section>

<!-- Modal -->
<div class="modal fade" id="modalAdvice" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Get Legal Advice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="legalAdvice">
                    <div class="form-group mb-3">
                        <input type="text" name="fname" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="address" class="form-control" placeholder="Your Address" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="contact" class="form-control" placeholder="Your Contact No" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                        <label>Practice Areas</label>
                        <select class="custom-select" name="practice_area" id="inputGroupSelect01" required>
                            <option value="">Please select</option>
                            <?php foreach ($areas as $row) : ?>
                                <option value="<?= $row->practice_title ?>"><?= $row->practice_title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Initial Case Story" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Send Inquiry</button>
            </div>
            </form>
        </div>
    </div>
</div>