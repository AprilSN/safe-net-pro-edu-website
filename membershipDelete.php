<?php
    include 'connection.php';
    $user_id=$_GET['user_ID'];
    $ssql="Delete from user_account where user_id='$user_id'";
    $result=$conn->query($ssql);
    header("location:viewmember.php");
?>