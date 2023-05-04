<?php require('layouts/header.php'); ?>
<div class="" style="background-image:url('images/page-contact-banner.jpg'); background-position: 50% 30%;">
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-center offset-lg-2 pv-20">
                <h2 class="title">Contact Us</h2>
                <div class="separator mt-10"></div>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi perferendis magnam ea necessitatibus, officiis voluptas odit! Aperiam omnis, cupiditate laudantium velit nostrum, exercitationem accusamus, possimus soluta illo deserunt tempora qui.</p>
            </div>
        </div>
    </div>
</div>

<section class="main-container pv-40">

    <div class="container">
        <div class="row">

            <div class="main col-lg-8 mb-30">
                <p class="lead">It would be great to hear from you! Just drop us a line and ask for anything with which you think we could be helpful. We are looking forward to hearing from you!</p>

                <div class="contact-form">
                    <form>
                        <div class="form-group has-feedback">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" name="name" placeholder="">

                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" name="email" placeholder="">

                        </div>
                        <div class="form-group has-feedback">
                            <label for="subject">Subject*</label>
                            <input type="text" class="form-control" name="subject" placeholder="">

                        </div>
                        <div class="form-group has-feedback">
                            <label for="message">Message*</label>
                            <textarea class="form-control" rows="6" placeholder=""></textarea>

                        </div>
                        <input type="submit" value="Submit" class="submit-button btn btn-default">
                    </form>
                </div>
            </div>

            <aside class="col-lg-3 offset-xl-1">
                <div class="sidebar">
                    <div class="side vertical-divider-left">
                        <h3 class="title logo-font">The <span class="text-default">Project</span></h3>
                        <div class="separator-2 mt-20"></div>
                        <ul class="list-icons">
                            <li><i class="fa fa-map-marker pr-2 text-default"></i> Mirpur2, Dhaka</li>
                            <li><i class="fa fa-phone pr-2 text-default"></i> +880123456789</li>
                            <li><a href="mailto:abc@gmail.com"><i class="fa fa-envelope-o pr-2"></i>abc@gmail.com</a></li>
                        </ul>
                        <ul class="social-links circle small">
                            <li><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                            <li><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                        <div class="separator mt-20 "></div>
                        <a class="btn btn-success" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">Show Map <i class="fa fa-plus"></i></a>

                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="section pv-40" style="background-color: rgba(221, 221, 221, 0.34);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call-to-action text-center">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h2 class="title">Join Us Now</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus error pariatur deserunt laudantium nam, mollitia quas nihil inventore, quibusdam?</p>
                            <div class="separator"></div>
                            <form class="form-inline margin-clear d-flex justify-content-center">
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="subscribe2">Email address</label>
                                    <input type="email" class="form-control form-control-lg" id="subscribe2" placeholder="Enter email" name="subscribe2" required="">

                                </div>
                                <button type="submit" class="btn btn-lg btn-success ml-3">Submit <i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('layouts/footer.php'); ?>