<!DOCTYPE html>
<html lang="en">
    <?php
        include 'connection.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - SNS Profiles Update</title>
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
                <h1>Welcome Admin to our SafeNet Pro!</h1>
                <p>Empower teens with knowledge and tools to navigate the digital world safely. Educate them on the risks and how to stay safe online. <br> Let's promote #StaySafeOnline! </p>
            </div>
        </div>

        <div class=navigation>
            <nav>
                <ul>
                    <li><a href="adminhome.php">Home</a></li>
                    <li><a href="eduContentsSetup.php">Articles</a></li>
                    <li><a href="newsLettersSetup.php">Newsletters</a></li>
                    <li><a href="viewmember.php">Membership</a></li>
                    <li><a href="snsProfileSetup.php">SNS-Profiles</a></li>
                    <li><a href="webservicesSetup.php">Web-Services</a></li>
                    <li><a href="supportInfo.php">Support</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <!-- Add more navigation items as needed -->
                </ul>
            </nav> 
        </div>
    </header> 

    <section class="home-page">
        <?php
            if(isset($_GET['profile_ID']))
            {
                $prof_id=$_GET['profile_ID'];
                $ssql="Select * from socialmedia_profiles where profile_id='$prof_id'";
                $result= $conn->query($ssql);
                $row=$result->fetch_assoc();
            }
        ?>
        <h1>SNS-Profile Update Form</h1>
        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="profile_ID" value="<?php echo $row['profile_id'];?>">

            <label for="profile">Profile Name:</label>
            <input type="text" id="profile" name="profile" value="<?php echo $row['profile_name'];?>" required>

			<label for="url">Profile URL:</label>
            <input type="text" id="url" name="url" value="<?php echo $row['profile_url'];?>" required>

            <label for="platform">Platform Name:</label>
            <input type="text" id="platform" name="platform" value="<?php echo $row['platform_name'];?>" required>
            
            <label for="logo">Platform Logo:</label>
            <input type="file" id="logo" name="logo" required>
            
            <input type="submit" name="btn_update" value="Update Social Media Profile">
        </form>
        <?php
        //Check Whether if i clicked the submit button
            if(isset($_POST['btn_update']))
            {
                if(isset($_FILES["logo"]) && $_FILES["logo"]["error"]==0)
                {
                    $filename = $_FILES["logo"]["name"];
                    $filepath = $_FILES["logo"]["tmp_name"];
                
                //echo $filepath;
                $profile = $_POST['profile'];
                $url = $_POST['url'];
                $platform = $_POST['platform'];
                
                //insert query prepare
                $ssql="Update socialmedia_profiles set profile_name='$profile', profile_url='$url', platform_name='$platform', platform_logo='$filename' where profile_id='$prof_id'";
                
                    // querying into the database '$conn'
                    if($conn->query($ssql)==TRUE)
                    {
                        move_uploaded_file($filepath,"images\\".$filename);
                        header("location:snsProfileSetup.php");
                    }
                }
            }
        ?>
    </section>
    
    <footer>
        <p>You are here: SNS-Profiles Edit</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 
    
</body>
</html>