<?php 
require 'core/init.php';
if(isset($_GET['id'])) {
require_once("cls/cart.php"); 
$cart = new cart();
$product = $cart->getProductData($_GET['id']);
require('layouts/header.php'); ?>

<div class="" style="background-image:url('images/page-contact-banner.jpg'); background-position: 50% 30%;">
<div class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a class="link-dark" href="shop.php">Shop</a></li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 text-center offset-lg-2 pv-20">
            <h2 class="title">Product</h2>
            <div class="separator mt-10"></div>
            <p class="text-center">Lorng elit. Excepturi perferendis magnam ea necessitatibus, officiis voluptas odit! Aperiam omnis, cupiditate laudantium velit nostrum, exercitationem accusamus, possimus soi.</p>
        </div>
    </div>
</div>
</div>

<div class="container">
<div class="row">
    <div class="main col-12">
        <h1 class="text-center mt-20">Product Details Page</h1>
        <div class="separator"></div>
        <div class="row">
            <div class="col-lg-4"> <img class="group list-group-image" src="imageView.php?id=<?php echo $product->id; ?>" /></div>
            <div class="col-lg-8">
                <h3 class="mt-0"><?php print $product->name; ?></h3>

                <p class="lead">Tk <?php print $product->price; ?></p>
                <h4 class="mt-10">Quick Overview</h4>
                <div class="std">
                    <?php print $product->descr; ?> <br><br><br>
                </div>

                <div class="mt-10">
                    <span style="cursor:pointer;" class="addToCart btn btn-success" data-id="<?php print $product->id; ?>">add to cart</span>
                    <!-- <a class="btn btn-success" href="#">Add to cart</a> -->
                </div>
                <hr class="mb-10">
                <div class="mb-20"> 
                    <span>
                      <i class="fa fa-star" style="color: red"></i>
                      <i class="fa fa-star" style="color: red"></i>
                      <i class="fa fa-star" style="color: red"></i>
                      <i class="fa fa-star" style="color: red"></i>
                      <i class="fa fa-star"></i>
                    </span> 
                    <a href="#" class="wishlist"><i class="fa fa-heart-o pl-10 pr-1"></i>Wishlist</a>
                    <ul class="pl-20 pull-right social-links circle small mt-0">
                        <li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                        <li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                        <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main col-12 mb-30">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
            <li class="nav-item"><a class="nav-link" href="#specification" aria-controls="specification" role="tab" data-toggle="tab">Specification</a></li>
            <li class="nav-item"><a class="nav-link" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        </ul>

        <div class="tab-content pt-20">
            <div role="tabpanel" class="tab-pane fade show active" id="description">
                Model - Lenovo IP 110, Processor - Intel CDC N3060, Processor Clock Speed - 1.60-2.48GHz, CPU Cache - 2MB, 
                <hr>Display Size - 14", Display Type - LED Display, Display Resolution - 1366 x 768, 
                <hr>RAM - 4GB, RAM Type - DDR3, RAM Slot - Built-In, Max RAM Support - 4GB, 
                <hr>HDD - 1TB HDD, Graphics Chipset - Intel HD 400, Graphics Memory - Shared, 
                <hr>Optical Device - DVD RW, 
                <hr>Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, 
                <hr>Display Port - HDMI, Audio Port - Combo, 
                <hr>USB Port - 1 x USB3.0, 1 x USB2.0, 
                <hr>Battery - 3 Cell, Backup Time - Up to 4 Hrs., 
                <hr>Operating System - Free Dos, Weight - 2.17Kg, 
                <hr>Color - Black, 
                <hr>Warranty - 1 year, 
                <hr>Others - 180 Degree Flip Display, 
                <hr>Country of Origin - China

            </div>
            <div role="tabpanel" class="tab-pane fade" id="specification">
                <div class="std">
                    Processor - Intel CDC N3060<hr>
                    Processor Clock Speed - 1.60-2.48GHz<hr>
                    Display Size - 14"<hr>
                    RAM - 4GB<hr>
                    RAM Type - DDR3<hr>
                    HDD - 1TB HDD<hr>
                    Operating System - Free Dos
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="messages">
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
        </div>
    </div>
</div>

</div>
<?php require('layouts/footer.php'); 
}
else Redirect::to('home');;
?>