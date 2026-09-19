<?php
    include 'connection.php';
    $cont_id=$_GET['content_ID'];
    $ssql="Delete from educational_contents where content_id='$cont_id'";
    $result=$conn->query($ssql);
    header("location:eduContentsSetup.php");
?>