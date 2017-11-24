<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/14/2017
 * Time: 3:31 PM
 */

require_once 'db-connect.php';

if (isset( $_POST['bol'],$_POST['skr'], $_POST['origin'], $_POST['destination'], $_POST['containerno'],
    $_POST['no_of_containers'], $_POST['weight'], $_POST['rar'], $_POST['duty'], $_POST['edd'],
    $_POST['shipper'], $_POST['consignor'], $_POST['consignee'], $_POST['details'])) {

    $bol=$_POST['bol'];
    $skr=$_POST['skr'];
    $origin=$_POST['origin'];
    $destination=$_POST['destination'];
    $containerNo=$_POST['containerno'];
    $NoOfContainers=$_POST['no_of_containers'];
    $weight= $_POST['weight'];
    $rar=$_POST['rar'];
    $duty=$_POST['duty'];
    $edd=$_POST['edd'];
    $shipper= $_POST['shipper'];
    $consignor=$_POST['consignor'];
    $consignee=$_POST['consignee'];
    $details=$_POST['details'];
    if ($insert_stmt = $mysqli->prepare("INSERT INTO shipment ( bol,skr, origin,destination
         ,containerno,no_of_containers,weight,rar,duty,edd,shipper,consignor,consignee,details)
        VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?,?,?)")) {
        $insert_stmt->bind_param('ssssssssssssss',  $bol,$skr, $origin,$destination,$containerNo,$NoOfContainers,$weight
            ,$rar,$duty,$edd,$shipper,$consignor,$consignee,$details);
        // Execute the prepared query.
        if (!$insert_stmt->execute()) {
            header('Location: ../admin/dashboard.php?err=Registration failure');
        } else {
            header('Location: ../admin/shipment.php');
        }
    }
}