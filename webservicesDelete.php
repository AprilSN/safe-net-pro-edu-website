<?php
    include 'connection.php';
    $web_id=$_GET['service_ID'];
    $ssql="Delete from web_services where webservice_id='$web_id'";
    $result=$conn->query($ssql);
    header("location:webservicesSetup.php");
?>