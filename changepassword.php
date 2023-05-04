<?php
require_once 'core/init.php';
$user=new User();
if(!$user->isLoggedIn()){
	Redirect::to('index');
}
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate=new Validation();
		$validation=$validate->check($_POST,array(
			'password'=>array(
				'required'=>true,
				'min'=>6
			),
			'new_password'=>array(
				'required'=>true,
				'min'=>6
			),
			'new_password_again'=>array(
				'required'=>true,
				'min'=>6,
				'matches'=>'new_password'
			)
		));
		if($validation->passed()){
			if(Input::get('password')!==Hash::decript($user->data()->password) ){
				echo 'Your current password is wrong.';
			}else{
				$user->update(array(
					'password'=>Hash::encript(Input::get('new_password'))
				));
				Session::flash('home','Your password has been changed.<br>');
				Redirect::to('index');
			}
		}else{
			foreach($validation->errors() as $error){
				echo $error,'<br>';
			}
		}
	}
}
require 'layouts/header.php';
?>
<div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Password</li>
            </ol>
        </div>
    </div>
<section class="section pv-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">

                            
                            <form action="" method="post">
                            	<div class="field">
                            		<label for="password">Current password:</label>
                            		<input class="mb-20 form-control" type="password" name="password" id="password" autocomplete="off">
                            	</div>
                            	<div class="field">
                            		<label for="new_password">New password:</label>
                            		<input class="mb-20 form-control" type="password" name="new_password" id="new_password" autocomplete="off">
                            	</div>
                            	<div class="field">
                            		<label for="new_password_again">New password again:</label>
                            		<input class="mb-20 form-control" type="password" name="new_password_again" id="new_password_again" autocomplete="off">
                            	</div>
                            	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            	<input type="submit" value="Change" class="btn btn-lg btn-info">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
require 'layouts/footer.php';
 ?>