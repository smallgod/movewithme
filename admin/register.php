<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2017
 * Time: 1:26 PM
 */

$page="Register";
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<?php require_once '../components/header.php'; ?>
<body data-open="click" data-menu="vertical-menu" data-col="1-column"
      class="vertical-layout vertical-menu 1-column  blank-page blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <img src="../app-assets/images/logo/logo.PNG" alt="branding logo">
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span>
                            </h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal " action="../includes/register.inc.php" method="post" >
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input type="text" class="form-control form-control-lg input-lg" id="username" name="username"
                                               placeholder="User Name">
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input type="email" class="form-control form-control-lg input-lg"
                                               id="email" name="email" placeholder="Your Email Address" required>
                                        <div class="form-control-position">
                                            <i class="icon-mail6"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg"
                                               id="password" name="password" placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg"
                                               id="confirmpwd" name="confirmpwd" placeholder="Confirm Password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <button  class="btn btn-primary btn-lg btn-block"
                                            onclick="return regformhash(this.form, this.form.username,this.form.email,this.form.password,this.form.confirmpwd);">
                                        <i class="icon-unlock2"></i> Register
                                    </button>
                                </form>
                            </div>
                            <p class="text-xs-center">Already have an account ? <a href="index.php" class="card-link">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php require_once '../components/scripts.php'; ?>
</body>
</html>
