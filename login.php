<?php

require_once 'layouts/header.php';
?>

<div class="uk-vertical-align uk-text-center uk-height-1-1 mv-45">
<div class="uk-vertical-align-middle" style="width: 450px;">

    <div id="site_title">
  	<h2><a href="index.php">ACUTE STORE CENTER</a> </h2>
</div>
    <form class="uk-panel uk-panel-box uk-form"  method="post" action="">
        <div class="uk-form-row">
            <input class="uk-width-1-1 uk-form-large" placeholder="Username" 
                type="text" name="username" id="username" autocomplete="off"
                value="<?php echo escape(Input::get('username')); ?>" >
        </div>
        <div class="uk-form-row">
              <div class="uk-form-password">
                  <input name="password" class="uk-width-1-1 uk-form-large" type="password" placeholder="Password">
                  <a href="" class="uk-form-password-toggle" data-uk-form-password="{lblShow:'Show', lblHide:'Hide'}" data-uk-form-password>Show</a>
              </div>
        </div>
        <div class="uk-form-row">
            <!-- <a class="uk-width-1-1 uk-button uk-button-primary uk-button-large" href="#">Login</a> -->
            <input class="uk-width-1-1 uk-button uk-button-primary uk-button-large" name="submit" type="submit" value="Login">
        </div>
        <div class="uk-form-row uk-text-small">
            <label class="uk-float-left">
                <input type="checkbox" name="remember" id="remember"> Remember me
            </label>
            <a class="uk-float-right uk-link uk-link-muted" href="registration.php">Create an account</a>
            <!-- <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a> -->
        </div>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </form>

</div>
</div>
<?php require 'layouts/footer.php'; ?>