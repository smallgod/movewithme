<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2017
 * Time: 12:39 PM
 */

$page = "login";
require_once '../includes/db-connect.php';
require_once '../includes/functions.php';
sec_session_start();
createTables($mysqli);
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<?php require_once '../components/header.php'; ?>
<?php if (login_check($mysqli) == true) :
    header("Location: ../admin/dashboard.php");
endif; ?>
<body data-open="click" data-menu="vertical-menu" data-col="1-column"
      class="vertical-layout vertical-menu 1-column  blank-page blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1"><img src="../app-assets/images/logo/logo.PNG" alt="branding logo">
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with ID</span>
                            </h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal" action="../includes/process_login.php" method="post">
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
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                            <fieldset>
                                                <a href="../" class="card-link">Back to home</a>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a
                                                    href="recover-password.html" class="card-link">Forgot Password?</a>
                                        </div>
                                    </fieldset>
                                    <button class="btn btn-primary btn-lg btn-block"
                                            onclick="formhash(this.form, this.form.password);"><i
                                                class="icon-unlock2"></i> Login
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html"
                                                                               class="card-link">Recover password</a>
                                </p>
                                <p class="float-sm-right text-xs-center m-0">New to Shumuk? <a href="register.php"
                                                                                               class="card-link">Sign
                                        Up</a></p>
                            </div>
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
