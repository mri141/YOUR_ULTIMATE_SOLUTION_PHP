<?php 
require_once 'core/init.php';
if (isset($_SESSION['id']) ) {
    header('location: admin.php');
}


if(Input::exists()){
  if(Token::check(Input::get('token'))){
    $validate=new Validation();
    $validation=$validate->check($_POST,array(
      'username'=>array(
        'required'=>true,
        'min'=>2,
        'max'=>16,
        'unique'=>'user'
      ),
      'password'=>array(
        'required'=>true,
        'min'=>6,
      ),
      'password_again'=>array(
        'required'=>true,
        'matches'=>'password'
      ),
      'name'=>array(
        'required'=>true,
        'min'=>2,
        'max'=>24
      )
    ));
    if($validation->passed()){
      $user=new User();
      try{
        $user->create(array(
          'username'=>Input::get('username'),
          'password'=>Hash::encript(Input::get('password')),
          'name'=>Input::get('name'),
          'joined'=>date('Y-m-d H:i:s'),
          'role'=>1
        ));
        Session::flash('home','You have been registred and can now log in.<br>');
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


<section class="section pv-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">

                            <form action="" method="post">
                              <div class="field">
                                <label for="username">Username:</label>
                                <input class="mb-20 form-control" type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
                              </div>
                              <div class="field">
                                <label for="password">Select a password:</label>
                                <input class="mb-20 form-control" type="password" name="password" id="password" autocomplete="off">
                              </div>
                              <div class="field">
                                <label for="password_again">Password again:</label>
                                <input class="mb-20 form-control" type="password" name="password_again" id="password_again" autocomplete="off">
                              </div>
                              <div class="field">
                                <label for="name">Full name:</label>
                                <input class="mb-20 form-control" type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" autocomplete="off">
                              </div>
                              <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                              <input type="submit" value="Register" class="btn btn-lg btn-info">
                              <a class="uk-float-right uk-link uk-link-muted" href="login.php"><-  Back to login</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php require 'layouts/footer.php'; ?>