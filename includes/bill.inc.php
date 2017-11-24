<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2017
 * Time: 11:27 PM
 */
require_once 'db-connect.php';

if (isset($_POST['billno'], $_POST['skr'],$_POST['origin'], $_POST['destination'], $_POST['weight'], $_POST['rar'], $_POST['duty'], $_POST['edd'],
     $_POST['consignor'], $_POST['consignee'], $_POST['details'])) {

    $billNo=$_POST['billno'];
    $skr=$_POST['skr'];
    $origin=$_POST['origin'];
    $destination=$_POST['destination'];
    $weight= $_POST['weight'];
    $rar=$_POST['rar'];
    $duty=$_POST['duty'];
    $edd=$_POST['edd'];
    $consignor=$_POST['consignor'];
    $consignee=$_POST['consignee'];
    $details=$_POST['details'];
    if ($insert_stmt = $mysqli->prepare("INSERT INTO bills (billno, skr,origin,destination, weight,rar,duty,edd,consignor,consignee,details)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)")) {
        $insert_stmt->bind_param('sssssssssss', $billNo, $skr,$origin,$destination,$weight
        ,$rar,$duty,$edd,$consignor,$consignee,$details);
        // Execute the prepared query.
        if (!$insert_stmt->execute()) {
            header('Location: ../admin/dashboard.php?err=Registration failure');
        } else {
            header('Location: ../admin/airwaybill.php');
        }
    }
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $location=$_POST['location'];
    $status=$_POST['status'];
    $date=$_POST['date'];
    if($insert_stmt=$mysqli->prepare("INSERT INTO billstatus(billno,location,status,status_date)VALUES (?,?,?,?)")){
        $insert_stmt->bind_param('ssss',$id,$location,$status,$date);
        // Execute the prepared query.
        if (!$insert_stmt->execute()) {
            header('Location: ' . $_SERVER['HTTP_REFERER'].'?err=failed to insert');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'].'');
        }
    }
}

//delete status
if(isset($_GET['id'],$_GET['q'])){
    $id=$_GET['id'];
    if($_GET['q']=='remove'){
        $mysqli->query("DELETE FROM billstatus where id=".$id);
    }

}

//ajax search
if(isset($_GET['bill'])){
    $q=$_GET['bill'];
    $fromTo='to';
    $result='';
    $starttime=microtime(true);
    $prep_stmt = "SELECT * FROM bills WHERE billno LIKE '%".$q."%'";
    $stmt = $mysqli->prepare($prep_stmt);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $billNo,$skr,  $origin, $destination, $weight
        , $rar, $duty, $edd, $consignor, $consignee, $details);
    $rows1=$stmt->num_rows();
   while ($stmt->fetch()):
       if($destination==''&&$origin==''){$fromTo='';}else{$fromTo='to';}
       $result=$result.'<li class="media">
                        <div class="media-body">
                            <p class="lead mb-0"><a href="admin/billstatus.php?id='.$id.'"><span class="text-bold-600">'.$billNo.'</span> '.$origin.' '.$fromTo.' '.$destination.'</a></p>
                            <p class="mb-0"><a href="admin/airwaybill.php" class="green darken-1">http://shumuklogistics.com/<span class="text-bold-600">admin</span>/airwaybill.php <i class="icon-caret-down" aria-hidden="true"></i></a></p>
                            <p><span class="text-muted">'.date("d,M Y",strtotime($edd)).'- </span><span class="text-bold-600"> AirwayBill</span> Consignee is <span class="text-bold-600">'.$consignee.'</span> and cargo is to be delivered to '.$consignor.'. The destination address is set to '.$destination.'...</p>
                        </div>
                    </li>';
       endwhile;
    $prep_stmt = "SELECT * FROM shipment WHERE bol LIKE '%".$q."%'";
    $stmt = $mysqli->prepare($prep_stmt);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $bol,$skr,  $origin, $destination,$containerno,$noOfcontainers, $weight
        , $rar, $duty, $edd, $shipper,$consignor, $consignee, $details);
    $rows2=$stmt->num_rows();
    while ($stmt->fetch()):
        if($destination==''&&$origin==''){$fromTo='';}else{$fromTo='to';}
        $result=$result. '<li class="media">
                        <div class="media-body">
                            <p class="lead mb-0"><a href="admin/billstatus.php?id='.$id.'"><span class="text-bold-600">'.$bol.'</span> '.$origin.' '.$fromTo.' '.$destination.'</a></p>
                            <p class="mb-0"><a href="admin/shipment.php" class="green darken-1">http://shumuklogistics.com/<span class="text-bold-600">admin</span>/shipment.php <i class="icon-caret-down" aria-hidden="true"></i></a></p>
                            <p><span class="text-muted">'.date("d,M Y",strtotime($edd)).'- </span><span class="text-bold-600"> Bill of Lading</span> Consignee is <span class="text-bold-600">'.$consignee.'</span> and cargo is to be delivered to '.$consignor.'. The destination address is set to '.$destination.' Number of containers is '.$noOfcontainers.'...</p>
                        </div>
                    </li>';
    endwhile;
    $endtime=microtime(true);
    $duration=$endtime-$starttime;
    $rowz=$rows1+$rows2;
    echo '<p class="text-muted font-small-3">About '.$rowz.' results ('.round($duration,3) .' seconds) </p>
           <ul class="media-list row" id="search-list">
                                <!-- Results here-->
                                '.$result.'
                                <!--/ Results here-->
                            </ul>';
}