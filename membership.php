<!DOCTYPE html>
<html lang="en">
    <?php
        include 'connection.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Membership</title>
</head>

<body>
<header>
        <div class="title">  
            <div class="logo">
                <img src="images/safetynet-pro-smc-logo-transparent.png" alt="logo">
            </div>
            
            <!-- <div class="title">
                <h1>SafeNet Pro SMC LTD.</h1>
            </div> -->

            <div class="welcome">
                <h1>Welcome to our SafeNet Pro Social Media Campaign Hub!</h1>
                <p>Empowering teens with knowledge and tools to navigate the digital world safely. Learn about the risks and how to keep teenagers safe online. <br> Explore our guide and #StaySafeOnline. </p>
            </div>
        </div>

    </header>

    <section class="home-page">
        <h1>Membership Registeration</h1>
    
        <!-- Form to Create/Update Newsletter Features -->
        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="email_address">Email Address:</label>
            <input type="email" id="email_address" name="email_address" required>

            <label for="user_name">User Name:</label>
            <input type="text" id="user_name" name="user_name" required>

            <label for="password">Password:</label>
            <input type="password" id="user_password" name="user_password" required>

            <label for="user_dob">Date of Birth:</label>
            <input type="date" id="user_dob" name="user_dob" required>

            <label for="news_sub"> NewsLetter Subscription</label>
            <div class="privacy-policy">
                <label>YES
                    <input type="radio" id="news_sub" name="news_sub" value="Yes" required>
                </label> 
                <label>NO
                    <input type="radio" id="news_sub" name="news_sub" value="No">
                </label>
            </div>
            
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" required>
            
            <input type="submit" name="btn_member" value="Subscribe Membership">
        </form>

        <?php
    //Check Whether if i clicked the submit button
        if(isset($_POST['btn_member']))
        {
            if(isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"]==0)
            {
                $filename = $_FILES["profile_picture"]["name"];
                $filepath = $_FILES["profile_picture"]["tmp_name"];

            
            //echo $filepath;
                $full_name = $_POST['full_name'];
	            $email_address = $_POST['email_address'];
	            $user_name = $_POST['user_name'];
	            $user_password = $_POST['user_password'];
	            $user_dob = $_POST['user_dob'];
	            $reg_date = date("Y/m/d");
	            $news_sub = $_POST['news_sub'];

                //insert query prepare
                $ssql="INSERT INTO user_account(user_id, full_name, email_address, user_name, user_password, user_type, date_of_birth, registration_date, subscription_status, newsletter_preference, profile_picture) VALUES(Null,'$full_name', '$email_address', '$user_name', '$user_password', 'MEMBER','$user_dob','$reg_date','$news_sub','','$filename')";
            
                // querying into the database '$conn'
                if($conn->query($ssql)==TRUE)
                {
                    move_uploaded_file($filepath,"images\\".$filename);
                    header('location:login.php');
                }
            }
        }
    ?>
           
    </section>

    <footer>
        <p>You are here: Registeration</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved. | Follow us on Social Medias below.
            <div class="social-media-buttons">
                <a href="#" target="_blank" title="Follow us on Facebook"><img src="images/icons/fb.png" alt="Facebook"></a>
                <a href="#" target="_blank" title="Follow us on Twitter"><img src="images/icons/twitter.png" alt="Twitter"></a>
                <a href="#" target="_blank" title="Follow us on Instagram"><img src="images/icons/ins.png" alt="Instagram"></a>
            </div>
        </p>  
    </footer>

</body>

</html>
