<?php use_helper('I18N') ?>

<form  action="<?php echo url_for('/sfGuardAuth/signin') ?>" method="post">
 
            
<div class="login-box">
      <div class="login-logo">
        <a>Volar <b>en Globo</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
            Sign in to start your session
        <?php echo $form->renderGlobalErrors() ?>
        <?php echo $form->renderHiddenFields(false) ?>
        </p>
       <form action="<?php echo url_for('/sfGuardAuth/signin') ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="signin[username]" id="signin_username" class="form-control" placeholder="Usuario / Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
           
              <input type="password" name="signin[password]" id="signin_password" class="form-control" placeholder="Password">
              
            
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8" style="padding-left: 35px">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
                <input type="submit" class="btn btn-primary btn-block btn-flat" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
            </div><!-- /.col -->
          </div>
        </form>

<!--        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
        

      </div><!-- /.login-box-body -->
      <div style="clear: both; margin: 0 auto; width: 140px; margin-top: 20px">
    
        <a href="http://codespacelab.com/" target="_blank">
            <img src="/codespace_logo.png" alt="Codespace" border="0">
        </a><br>
          <strong>&copy; 2017 </strong> Developed by 
        <div style="clear: both"></div>
    </div>
    </div><!-- /.login-box -->
    
  
</form>