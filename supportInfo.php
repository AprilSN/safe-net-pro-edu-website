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
    <title>SMC Ltd. - Membership Users</title>
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
        <h1>User Inquiry List</h1>
        <!-- Display Existing Newletters Feature -->
        <div class="retrieve_data">
            
            <form class="form_search">
                <input type="text" id="search" name="search" placeholder="Search for anything...">
                <input type="submit" name="search_submit" value="SEARCH">
            </form>
            <?php
            if(isset($_GET['search_submit'])){
                $search=$_GET['search'];
                $ssql="Select * from user_inquiries where full_name like '%$search%' OR email_address like '%$search%' OR phone_number like '%$search%' OR inquiry_messege like '%$search%'";
                $result=$conn->query($ssql);
            }
            else{
                $ssql="Select * from user_inquiries";
                $result= $conn->query($ssql);
                if ($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>
                        <div class="service-item">
                            <h3><?php echo $row['full_name']; ?></h3>
                            <p><?php echo $row['inquiry_messege']; ?></p>
                            <ul>
                                <li>Email: <?php echo $row['email_address']; ?></li>
                                <li>Phone: <?php echo $row['phone_number']; ?></li>
                                <li>Submission: <?php echo $row['inquiry_date']; ?></li>
                                <li>Status: <?php echo $row['inquiry_status']; ?></li>
                            </ul>
                            <!-- <span> &nbsp; <a href="#">Learn More</a></span> -->
                            <form class="setup-form" action="#" method="GET">
                                <input type="hidden" name="inquiry_ID" value="<?php echo $row['inquiry_id'];?>" required>
                                <input type="submit" name="btn_support" value="SUPPORTED">
                            </form>
                        </div>
            <?php              
                    }
                }
                if(isset($_GET['btn_support']))
                {             
                    $inquiry=$_GET['inquiry_ID'];
                    $ssql="Update user_inquiries set inquiry_status='SUPPORTED' where inquiry_id='$inquiry'";
                    if($conn->query($ssql)==TRUE)
                    {
                        echo "Status Successfully Updated";
                    }
                }        
            }
            ?>    

            </section>
        </div>     
    </section>

    <footer>
        <p>You are here: Support View</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>

</html>