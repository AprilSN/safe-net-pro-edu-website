<!DOCTYPE html>
<html lang="en">    

    <?php
        include 'connection.php';
        session_start();
        $email=$_SESSION['email'];
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Contact</title>
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

        <div class=navigation>
            <nav>
                <ul>
                    <li><a href="loginIndex.php">Home</a></li>
                    <li><a href="socialmedia.php">SNS-Profiles</a></li>
                    <li><a href="newsletters.php">Newsletters</a></li>
                    <li><a href="loginInfo.php">Information</a></li>
                    <li><a href="parentguide.php">Parent-Guides</a></li>
                    <li><a href="livestreaming.php">Livestreaming</a></li>
                    <li><a href="loginguideline.php">Legislations</a></li>
                    <li><a href="loginContact.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>  
        </div>
    </header>

    <section>
        <div class="contactform">
            <h3>Contact Us by Sending a Message</h3>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="formbox">
                    <div class="rowinfo">
                        <div class="inputbox">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="fname" required>
                        </div>
                        <div class="inputbox">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="lname" name="lname" required>
                        </div>
                    </div>
                    <div class="rowinfo">
                        <div class="inputbox">
                            <label for="email_address">Email Address:</label>
                            <input type="email" id="email_address" name="email_address" required>
                        </div>
                        <div class="inputbox">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="rowsend">
                        <div class="inputbox">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="8" required></textarea>
                        </div>
                    </div>
                    <div class="rowsend">
                        <div class="inputbox">
                            <input type="submit" name="btn_contact" value="SEND">
                        </div>
                    </div>
                </div>
            </form>
            <?php
            //Check Whether if i clicked the submit button
            if(isset($_POST['btn_contact']))
            {    
                //echo $filepath;
                $firstname = $_POST["fname"];
                $lastname = $_POST["lname"];
                $full_name = $firstname . ' ' . $lastname;
	            $email_address = $_POST['email_address'];
	            $phone = $_POST['phone'];
	            $messege = $_POST['message'];
	            $sub_date= date("Y/m/d"); 
                $status="PENDING";     
                
                    //insert query prepare
                $ssql="INSERT INTO user_inquiries (inquiry_id, full_name, email_address, phone_number, inquiry_messege, inquiry_date, inquiry_status) VALUES (NULL, '$full_name', '$email_address', '$phone', '$messege', '$sub_date', '$status')";
                
                // querying into the database '$conn'
                if($conn->query($ssql)==TRUE)
                {
                    move_uploaded_file($filepath,"images\\".$filename);
                    header('location:index.php');
                }
                else{
                    die("Could not execute the insert query.");   
                }
            }
            ?>
        </div>
    </section>
    <footer>
        <p>You are here: Contact</p>
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
