<?php 
require_once '../includes/db-connect.php';
require_once '../includes/functions.php';
sec_session_start();
$page="Add bill";
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
		<section id="basic-form-layouts">
		<?php require_once 'add_bill_form.php'?>
		</section>
		</div>
	</div>
	</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php require_once '../components/footer.php';?>
<?php require_once '../components/scripts.php';?>
</body>
</html>
