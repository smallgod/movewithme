<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2017
 * Time: 1:22 PM
 */

?>
<!-- BEGIN VENDOR JS-->
<script src="../app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="../app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="../app-assets/js/core/app.js" type="text/javascript"></script>
<script src="../app-assets/js/scripts/forms.js" type="text/javascript"></script>
<script src="../app-assets/js/scripts/ui/fullscreenSearch.min.js" type="text/javascript"></script>
<script src="../app-assets/js/scripts/tables/datatables/datatable-basic.min.js" type="text/javascript"></script>
<script src="../app-assets/js/scripts/sha512.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<?php if ($page == "coming") { ?>
    <script src="../app-assets/vendors/js/coming-soon/jquery.countdown.min.js" type="text/javascript"></script>
    <script src="../app-assets/js/scripts/coming-soon/coming-soon.js" type="text/javascript"></script>
<?php } if ($page == "Dashboard") { ?>
<script src="../app-assets/js/scripts/pages/dashboard-2.js" type="text/javascript"></script>
<script src="../app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<?php }?>
<!-- END PAGE LEVEL JS-->