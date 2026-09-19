<?php
    include 'connection.php';
    $prof_id=$_GET['profile_ID'];
    $ssql="Delete from socialmedia_profiles where profile_id='$prof_id'";
    $result=$conn->query($ssql);
    header("location:snsProfileSetup.php");
?>