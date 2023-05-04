<?php 
require_once 'core/init.php';
if(Session::exists('home')){ ?>
    <div class="alert alert-info alert-dismissable mb-0">
    <div class="container">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong> <?php echo Session::flash('home'); ?></strong>
        </div>
    </div> <?php
}
$user=new User();

if(Input::exists()){
  if(Token::check(Input::get('token'))){
    $validate=new Validation();
    $validation=$validate->check($_POST,array(
      'username'=>array('required'=>true),
      'password'=>array('required'=>true)
    ));
    if($validation->passed()){
      $user=new User();
      $remember=(Input::get('remember')==='on')?true:false;
      $login=$user->login(Input::get('username'),Input::get('password'),$remember);
      if($login){
        Redirect::to('index');
      }else{
        Session::flash('home','Login Faild<br>');
      }
    }else{
      foreach($validation->errors() as $error){
        echo $error,'<br>';
      }
    }
  }
}


?>


<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABC Solution</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="css/uikit.min.css" rel="stylesheet" type="text/css" />
    <link href="css/custom.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js" ></script>
    <script type="text/javascript" src="js/form-password.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>

    <script type="text/javascript" src="js/template.js"></script>

</head>

<body class="front-page">

<div class="scrollToTop "><i class="fa fa-angle-double-up"></i></div>

<div class="page-wrapper">
<div class="header-container">
    <div class="header-top dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-9">
                    <div class="header-top-first">
                        <ul class="social-links  small  hidden-sm-down">
                            <li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
                            <li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                            <li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                            <li class="flickr"><a target="_blank" href="http://www.flickr.com/"><i class="fa fa-flickr"></i></a></li>
                            <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                        <ul class="list-inline hidden-md-down">
                            <li class="list-inline-item"><i class="fa fa-phone pr-1 pl-2"></i>+880123456789</li>
                            <li class="list-inline-item"><i class="fa fa-envelope-o pr-1 pl-2"></i> abc@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 text-right">
                    <div class="btn-group">

                        <?php if($user->isLoggedIn()){ ?>    
                        <a class="btn btn-default"
                            href="profile.php?user=<?php echo escape($user->data()->username);?>">
                            <i class="fa fa-user-o pr-2"></i> <?php echo escape($user->data()->name);?>                                
                        </a>         
                        <a href="logout.php"  class="btn btn-default"><i class="fa fa-lock pr-2"></i> Logout</a>
                        <?php } else { ?>
                        <a href="register.php" class="btn btn-default"><i class="fa fa-user-o pr-2"></i> Sign Up</a>
                        <button id="header-top-drop-2" type="button" class="btn btn-default" data-toggle="modal" data-target="#myloginmodal"><i class="fa fa-lock pr-2"></i> Login</button>
                        <?php } ?>
                        <a href="show-cart.php" title="go to cart" class="btn btn-default"><i class="fa fa-cart-plus pr-2"></i> Cart</a>

                        <div class="modal fade" id="myloginmodal" tabindex="-1" role="dialog">
                        	<div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header pb-40">
                                        <button type="button" class="close mt-20" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Login System</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="login-form margin-clear" method="post" action="">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Username</label>
                                                <input class="form-control" placeholder="Username" 
                                                    type="text" name="username" id="username" autocomplete="off"
                                                    value="<?php echo escape(Input::get('username')); ?>" >
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Password</label>
                                                <input name="password" class="form-control" type="password" placeholder="Password">
                                            </div>

                                            <div class="uk-form-row uk-text-small">
                                                <label class="uk-float-left">
                                                    <input type="checkbox" name="remember" id="remember"> Remember me
                                                </label>
                                                <a class="uk-float-right uk-link uk-link-muted" href="registration.php">Create an account</a>
                                                <!-- <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a> -->
                                            </div>
                                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                            <button type="submit" class="btn btn-gray btn-large">Log In</button>
                                            <hr />
                                            <span class="text-center">Login with</span>
                                            <ul class="social-links  small colored">
                                                <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                                <li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-4 hidden-md-down pl-3">
                    <div class="header-first">

                        <div id="logo" class="logo">
                            <a href="index.php"><img id="logo_img" src="images/logo_light_blue.png" alt="The Project"></a>
                        </div>
                        <div class="site-slogan">Your Ultimate Solution ( A B C D )</div>
                    </div>

                </div>
                <div class="col-lg-8 col-xl-8">
                    <div class="header-second">
                        <div class="main-navigation">
                            <nav class="navbar navbar-toggleable-md navbar-light p-0">

                                <button class="navbar-toggler navbar-toggler-right mt-20" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-label="Toggle navigation">
			                      <span class="navbar-toggler-icon"></span>
			                    </button>
                                <div class="navbar-brand  hidden-lg-up">
                                    <div id="logo-mobile" class="logo">
                                        <a href="index.php"><img id="logo-img-mobile" src="images/logo_light_blue.png" alt="The Project"></a>
                                    </div>
                                    <div class="site-slogan">Your Ultimate Solution ( A B C D )</div>

                                </div>

                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                    <ul class="navbar-nav ml-md-auto ml-xl-auto">
                                        <li class="nav-item">
                                            <a href="index.php" class="nav-link">Home</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" >Features</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="gallery.php">Gallery</a></li>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">1st Level Menu</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">2nd Level Menu</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="login.php">Login Page</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="about-us.php" class="nav-link" >About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog.php" class="nav-link" >Blog</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="shop.php" class="nav-link dropdown-toggle" data-toggle="dropdown" >Shop</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="shop.php">Product List</a></li>
                                                <li><a href="product-details.php?id=8">Product Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="contact.php" class="nav-link">Contact Form</a>
                                        </li>

                                        <?php if($user->isLoggedIn()) : ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" 
                                                href="profile.php?user=<?php echo escape($user->data()->username);?>">
                                                <?php echo escape($user->data()->name);?>                                                    
                                            </a>
                                            
                                            <ul class="dropdown-menu">
                                                <li><a href="profile.php?user=<?php echo escape($user->data()->username);?>">View Profile</a></li>
                                                <li><a href="update.php">Profile update</a></li>
                                                <li><a href="changepassword.php">Change password</a></li>
                                                
                                                <?php if($user->permission('admin')) : ?>
                                                <li><a href="admin.php">Dashboard</a></li>
                                                <?php endif; ?>

                                            </ul>
                                        </li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
</div>