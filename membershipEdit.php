<!DOCTYPE html>
<html lang="en">
    <?php
        include 'connection.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Membership Users Update</title>
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
        if(isset($_GET['user_ID']))
        {
            $user_id=$_GET['user_ID'];
            $ssql="Select * from user where user_id='$user_id'";
            $result= $conn->query($ssql);
            $row=$result->fetch_assoc();
        }
    ?>
    <h1>Membership Update Form</h1>
	<form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="user_ID" value="<?php echo $row['user_id'];?>" required>

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name"  name="full_name" value="<?php echo $row['full_name'];?>" required>

        <label for="email_address">Email Address:</label>
        <input type="email" id="email_address" name="email_address" value="<?php echo $row['email_address'];?>" required>

        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo $row['user_name'];?>" required>

        <label for="news_sub"> NewsLetter Subscription</label>
        <div class="privacy-policy">
            <label>YES
                <input type="radio" id="news_sub" name="news_sub" value="Yes" required>
            </label> 
            <label>NO
                <input type="radio" id="news_sub" name="news_sub" value="No">
            </label>
        </div>
            
        <input type="submit" name="btn_member" value="Update Membership">
    </form>
    <?php
    //Check Whether if i clicked the submit button
        if(isset($_POST['btn_member']))
        {             
	    	//echo $filepath;
	    	$full_name = $_POST['full_name'];
	    	$email_address = $_POST['email_address'];
	    	$user_name=$_POST['user_name'];
	    	$sub_status=$_POST['news_sub'];
	    	$ssql="Update user_account set full_name='$full_name', email_address='$email_address', user_name='$user_name', subscription_status='$sub_status' where user_id='$user_id'";
    
            // querying into the database '$conn'
            if($conn->query($ssql)==TRUE)
            {
                move_uploaded_file($filepath,"images\\".$filename);
                header("location:viewmember.php");
            }
        }
    ?>
	</section>
	<footer>
        <p>You are here: Membership Edit</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 
</body>
</html>