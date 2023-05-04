<?php
require_once 'core/init.php';
require_once 'layouts/header.php';

if(!$username=Input::get('user')){
	Redirect::to('index');
}else{
	$user=new User($username);
	if(!$user->exists()){
		Redirect::to(404);
	}else{
		$data=$user->data();
	}
	?>
 
<div class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
<section class="section default-bg clearfix pv-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3><?php echo escape($data->username); ?></h3>
                            <p>User Name: <?php echo escape($data->username); ?></p>
                            <p>Full Name: <?php echo escape($data->name); ?></p>
                            <p>Joining Time: <?php echo escape($data->joined); ?></p>
                            <?php // var_dump($data); ?>
                        </div>
                        <div class="col-lg-4">
                            <br>
                            <p><a href="update.php" class="btn btn-lg btn-info">Edit<i class="fa fa-arrow-right pl-20"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php } 
require 'layouts/footer.php'; ?>