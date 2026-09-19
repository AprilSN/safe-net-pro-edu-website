<!DOCTYPE html>
<html lang="en">
    <?php
        include 'connection.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Newsletter Features Update</title>
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
            if(isset($_GET['newsletter_ID']))
            {
                $news_id=$_GET['newsletter_ID'];
                $ssql="Select * from newsletters where newsletter_id='$news_id'";
                $result= $conn->query($ssql);
                $row=$result->fetch_assoc();
            }
        ?>
        <h1>Newsletter Update Form</h1>

        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="news_ID" value="<?php echo $row['newsletter_id'];?>">

            <label for="title">Newsletter Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $row['newsletter_title'];?>" required>

            <label for="content">Newsletter Content:</label>
            <textarea id="content" name="content" rows="5" required>"<?php echo $row['newsletter_content'];?>"</textarea>
			
			<label for="pub_date">Publication Date:</label>
            <input type="date" id="pub_date" name="pub_date" value="<?php echo $row['publication_date'];?>" required>

            <label for="subcribers">Subcribers:</label>
            <input type="text" id="subcribers" name="subcribers" value="<?php echo $row['subscribers'];?>" required>
            
            <label for="cover">Cover Photo:</label>
            <input type="file" id="cover" name="cover" required>
            
            <input type="submit" name="btn_update" value="Update Newsletter">
        </form>
        <?php
        //Check Whether if i clicked the submit button
            if(isset($_POST['btn_update']))
            {
                if(isset($_FILES["cover"]) && $_FILES["cover"]["error"]==0)
                {
                    $filename = $_FILES["cover"]["name"];
                    $filepath = $_FILES["cover"]["tmp_name"];
                
                //echo $filepath;
                $title = $_POST['title'];
                $content = $_POST['content'];
                $pub_date = $_POST['pub_date'];
                $subscribers = $_POST['subcribers'];
                
                //insert query prepare
                $ssql="Update newsletters set newsletter_title='$title', newsletter_content='$content', publication_date='$pub_date', subscribers='$subscribers', cover_photo='$filename' where newsletter_id='$news_id'";
                
                    // querying into the database '$conn'
                    if($conn->query($ssql)==TRUE)
                    {
                        move_uploaded_file($filepath,"images\\".$filename);
                        header("location:newsLettersSetup.php");
                    }
                }
            }
        ?>
    </section>
    
    <footer>
        <p>You are here: Newsletters Edit</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>
</html>