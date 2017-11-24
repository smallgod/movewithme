<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/15/2017
 * Time: 11:52 PM
 */

$pg="coming";
?>

<?php require_once 'components/header_index.php';?>
<body data-open="click" data-menu="vertical-overlay-menu" data-col="1-column" class="vertical-layout vertical-overlay-menu 1-column  fixed-navbar">

<div id="fullscreen-search" class="fullscreen-search">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="px-2 py-3 row mb-0 mt-3">
                        <img class="img-fluid mx-auto d-block pb-3 pt-4 width-65-per" src="../../../app-assets/images/logo/robust-logo-dark-big.png" alt="Robust Search">
                        <fieldset class="form-group position-relative">
                            <input type="text" class="form-control form-control-lg input-lg" id="iconLeft" placeholder="Explore Robust ...">
                            <div class="form-control-position">
                                <i class="icon-microphone2 font-medium-4"></i>
                            </div>
                        </fieldset>
                        <div class="row py-2">
                            <div class="col-xs-12 text-xs-center">
                                <a href="search-website.html" class="btn btn-primary btn-md"><i class="icon-ios-search-strong"></i> Robust Search</a>
                                <span class="dropdown">
                        <button id="btnSearchDrop" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning  btn-md dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i> Advanced search</button>
                        <span aria-labelledby="btnSearchDrop" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="search-website.html" class="dropdown-item"><i class="icon-link4"></i> Web</a>
                            <a href="search-images.html" class="dropdown-item"><i class="icon-image4"></i> Images</a>
                            <a href="search-videos.html" class="dropdown-item"><i class="icon-video2"></i> Videos</a>
                            <a href="search-maps.html" class="dropdown-item"><i class="icon-map6"></i> Maps</a>
                            <span class="dropdown-divider block"></span>
                            <a href="search-maps.html" class="dropdown-item"><i class="icon-smile"></i> I'm Feeling Lucky</a>
                        </span>
                    </span>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="text-xs-center">
                                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="icon-facebook3"></span></a>
                                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="icon-twitter3"></span></a>
                                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="icon-linkedin3 font-medium-4"></span></a>
                                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span class="icon-github font-medium-4"></span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer navbar-fixed-bottom footer-dark">
        <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
    </footer>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php require_once 'components/script_index.php';?>
</body>
</html>