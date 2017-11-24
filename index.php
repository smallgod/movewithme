<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2017
 * Time: 12:20 PM
 */
$page = "Home";
require_once 'includes/db-connect.php';
require_once 'includes/functions.php';
sec_session_start();
createTables($mysqli);

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'components/header_index.php'; ?>
<body data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns" class="vertical-layout vertical-overlay-menu 2-columns  fixed-navbar">

<!-- navbar-fixed-top-->
<?php require_once 'components/nav_bar_home.php'?>
<?php require_once 'components/menu.php'?>
<!-- BEGIN Content-->
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <!-- project map based selling -->
        <div class="row">
            <div class="col-xs-12">
                <div class="card box-shadow-0">
                    <div class="card-body collapse in">
                        <div class="row">
                            <div class="col-xl-8 col-lg-12">
                                <div id="map" class="height-450"></div>
                                <script>
                                    function initMap() {
                                        var uluru = {lat: 51.5363932, lng: -0.3511163};
                                        var map = new google.maps.Map(document.getElementById('map'), {
                                            zoom: 6,
                                            center: uluru
                                        });
                                        var marker = new google.maps.Marker({
                                            position: uluru,
                                            map: map
                                        });
                                    }
                                </script>
                                <script async defer
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxKIKVOwNeUiBF9Dui_mjdt2m3ZxJgc3Y&callback=initMap">
                                </script>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12">
                                <div class="card card-inverse card-info text-xs-center">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <img src="uploads/logistics2.png" alt="element 05" height="170" class="mb-1">
                                            <h4 class="card-title">Track any Shipment Easily</h4>
                                            <p class="card-text">Enter Tracking code</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="p-2 bg-warning white media-body">
                                                <input type="text" placeholder="Search" class="menu-search form-control round" oninput="location.href='search.php'"/>
                                            </div>
                                            <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                                                <i class="icon-search font-large-1 white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- project map based selling -->

        <div class="row match-height">
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card" style="height: 500px;">
                    <div class="card-body">
                        <img class="card-img-top img-fluid" src="uploads/plane.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Airwaybill Tracking</h4>
                            <p class="card-text">
                                Track any Airway bill number on a single click. Here’s the fastest way to check the status of your shipment. No need to call Customer Service </p>
                            <a href="#" class="btn btn-outline-pink">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card" style="height: 500px;">
                    <div class="card-body">
                        <img class="card-img-top img-fluid" src="uploads/truck.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Container Tracking</h4>
                            <p class="card-text">
                                To track the location of the container, just specify its number and shipping line.The results of your search will show the current container location.</p>
                            <a href="#" class="btn btn-outline-pink">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card" style="height: 500px;">
                    <div class="card-body">
                        <img class="card-img-top img-fluid" src="uploads/ship.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Sea Freight Tracking</h4>
                            <p class="card-text">
                                Get detailed visibility into shipping activity across your supply chain, with highly customisable views, notifications and reporting.</p>
                            <a href="#" class="btn btn-outline-pink">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Content-->


<!-- START FOOTER DARK-->
<?php require_once 'components/script_index.php'; ?>

</footer>
<!-- START FOOTER DARK-->

</body>
</html>