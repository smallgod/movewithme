<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/11/2017
 * Time: 5:18 AM
 */

require_once '../includes/db-connect.php';
require_once '../includes/functions.php';
sec_session_start();
$page="Bill Status";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $prep_stmt = "SELECT * FROM bills WHERE id=".$id;
}else{$id=null;
    $prep_stmt = "SELECT * FROM bills";}
$stmt = $mysqli->prepare($prep_stmt);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $billNo,$skr,  $origin, $destination, $weight
    , $rar, $duty, $edd, $consignor, $consignee, $details);
$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<?php require_once '../components/header.php' ?>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
      class="vertical-layout vertical-menu 2-columns  fixed-navbar">

<?php require_once '../components/navbar.php' ?>
<?php require_once '../components/menu.php' ?>

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!--project Total Earning, visit & post-->
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card height-600">
                        <div class="card-header">
                            <h4 class="card-title"><i class="icon-eye-plus"></i>Airway Bill Status</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-block ">
                                <div class="list-group">
                                    <a href="#" class="list-group-item"><i class="icon-search"></i>
                                        <span class="menu-title">Search</span>
                                    </a>
                                    <a href="#" class="list-group-item active"><i class="icon-book"></i>
                                        <span class="menu-title"><?php echo $billNo;?></span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="icon-calendar-check-o"></i> <?php echo $edd;?></a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="icon-map-signs"></i> <?php echo $origin." to ".$destination;?></a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="icon-user"></i> <?php echo $consignee;?></a>
                                </div>
                                <br>
                                <h4 class="form-section"><i class="icon-plus"></i> Add Status</h4>
                                <form action="../includes/bill.inc.php?id=<?php echo $billNo;?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">Location<code>*</code></label>
                                                <input name="location" class="form-control border-primary" required placeholder="Current Location">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input name="date"  type="date" class="form-control border-primary" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status<code>*</code></label>
                                        <textarea name="status" rows="2" class="form-control border-primary" placeholder="More Details"></textarea>
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="card height-600">
                        <div class="card-header">
                            <h4 class="card-title"><i class="icon-book"></i> Airway Bill Details</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-block ">

                                <table class="table  table-hover zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php getBillStatus($mysqli,$id);?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/project Total Earning, visit & post-->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php require_once '../components/footer.php';?>
<?php require_once '../components/scripts.php';?>
</body>
</html>