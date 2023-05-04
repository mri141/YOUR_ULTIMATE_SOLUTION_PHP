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
			'name'=>array(
			'required'=>true,
			'min'=>2,
			'max'=>24
			)
		));
		if($validation->passed()){
			try{
				$user->update(array(
					'name'=>Input::get('name')
				));
				Session::flash('home','Your details have been updated.<br>');
				Redirect::to('index');
			}catch(Exception $e){
				die($e->getMessage());
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
            <li class="breadcrumb-item active">Update</li>
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
                            		<label for="name" class="mb-20">Name:</label>
                            		<input type="text" name="name" id="name" class="form-control" value="<?php echo escape($user->data()->name); ?>">
                            		
                            	</div>
                            	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            	<input type="submit" value="Update"  class="mt-20 btn btn-success">
                            	<a href="profile.php?user=<?php echo escape($user->data()->username);?>" class="mt-20 btn btn-info">View Profile<i class="fa fa-arrow-right pl-20"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php require 'layouts/footer.php'; ?>