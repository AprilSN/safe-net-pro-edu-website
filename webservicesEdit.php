<!DOCTYPE html>
<html lang="en">
    <?php
        include 'connection.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Web Services Update</title>
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
            if(isset($_GET['service_ID']))
            {
                $web_id=$_GET['service_ID'];
                $ssql="Select * from web_services where webservice_id='$web_id'";
                $result= $conn->query($ssql);
                $row=$result->fetch_assoc();
            }
        ?>
        <h1>Web-Service Update Form</h1>

        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="art_ID" value="<?php echo $row['webservice_id'];?>">

            <label for="name">Web Service Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['webservice_name'];?>" required>

            <label for="content">Web Service Content:</label>
            <textarea id="content" name="content" rows="5" required><?php echo $row['webservice_content'];?></textarea>

            <label for="info">Web Service Info:</label>
            <textarea id="info" name="info" rows="3" required><?php echo $row['webservice_info'];?></textarea>
            
            <label for="image">Web Service Image:</label>
            <input type="file" id="image" name="image" required>
            
            <input type="submit" name="btn_update" value="Update Webservice">
        </form>
        <?php
        //Check Whether if i clicked the submit button
            if(isset($_POST['btn_update']))
            {
                if(isset($_FILES["image"]) && $_FILES["multimedia"]["error"]==0)
                {
                    $filename = $_FILES["image"]["name"];
                    $filepath = $_FILES["image"]["tmp_name"];
                
                //echo $filepath;
                $name = $_POST['name'];
                $content = $_POST['content'];
                $info = $_POST['info'];
                
                //insert query prepare
                $ssql="Update web_services set webservice_name='$name', webservice_content='$content', webservice_image='$filename', webservice_info='$info' where webservice_id='$web_id'";
                
                    // querying into the database '$conn'
                    if($conn->query($ssql)==TRUE)
                    {
                        move_uploaded_file($filepath,"images\\".$filename);
                        header("location:webservicesSetup.php");
                    }
                }
            }
        ?>
    </section>

    <footer>
        <p>You are here: Web-Services Edit</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>
</html>