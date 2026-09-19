<?php
    include 'connection.php';
    $news_id=$_GET['newsletter_ID'];
    $ssql="Delete from newsletters where newsletter_id='$news_id'";
    $result=$conn->query($ssql);
    header("location:newsLettersSetup.php");
?>