<?php
    session_start();
    include 'connection.php';
    
    $email= $_POST['email'];
    $password= $_POST['password'];
    $admin="ADMIN";
    $member="MEMBER";

    $ssql = "SELECT * FROM user_account WHERE email_address='".$email."' AND user_password='".$password."' AND user_type='".$admin."'";
    $result=$conn->query($ssql);
    if($result->num_rows>0){
        $_SESSION['email'] = $email;
        header('location:adminhome.php');
    }
    else{
        $ssql = "SELECT * FROM user_account WHERE email_address='".$email."' AND user_password='".$password."' AND user_type='".$member."'";
        $result=$conn->query($ssql);
        if($result->num_rows>0){
            $_SESSION['email'] = $email;
            header('location:loginIndex.php');
        }
    }
    // else{
    //     if(!isset($_SESSION['attempt'])){
    //         $_SESSION['attempt'] = 0;
    //     }
        
    //     $_SESSION['attempt'] += 1;
        
    //     if($_SESSION['attempt'] === 3){
    //         $_SESSION['msg'] = "3 Times Login Failed! And Your Login is disabled wait 10mins";
    //         $_SESSION['check'] = 1;
    //         $_SESSION['attempt_again'] = time() + (1*60); //1*60 = 1mins, 10*60 = 10mins
    //     }else{
    //         $_SESSION['msg'] = "Invalid Username and Password!";
    //     }
        
    //     header('location:login.php');
    // }
?>