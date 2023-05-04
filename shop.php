<?php require 'layouts/header.php'; require_once("cls/cart.php"); ?>

<div class="" style="background-image:url('images/page-contact-banner.jpg'); background-position: 50% 30%;">
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Shop</li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-center offset-lg-2 pv-20">
                <h2 class="title">Shop</h2>
                <div class="separator mt-10"></div>
                <p class="text-center">Lorng elit. Excepturi perferendis magnam ea necessitatibus, officiis voluptas odit! Aperiam omnis, cupiditate laudantium velit nostrum, exercitationem accusamus, possimus soi.</p>
            </div>
        </div>
    </div>
</div>

<div class="container pt-30">
    <div id="products" class="row mt-30">
        <?php
            $cart = new cart();
            $products = $cart->getProducts();
        ?>
        <?php foreach($products as $product): ?>
        <div class="item  col-xs-4 col-md-4 mb-30">
            <div class="thumbnail">
                <img class="group list-group-image" src="imageView.php?id=<?php echo $product->id; ?>" />
                <!-- <img class="group list-group-image" src="images/product/1.jpg" alt="" /> -->
                <div class="caption">
                    <h4 class="mt-20">
                        <a href="product-details.php?id=<?php echo $product->id; ?>">                            
                            <?php print $product->name; ?>
                        </a>
                            
                    </h4>
                    <p class="group inner list-group-item-text">
                        <?php print $product->descr; ?><br><br>
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">Tk <?php print $product->price; ?></p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <span style="cursor:pointer;" class="addToCart btn btn-success" data-id="<?php print $product->id; ?>">add to cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="col-md-12 mb-30"><a href="show-cart.php" title="go to cart">Go to cart</a></div>
    </div>
</div>
<?php require 'layouts/footer.php'; ?>
