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
    <title>SMC Ltd. - Newsletters </title>
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
        <form class="form_search">
            <input type="text" id="search" name="search" placeholder="Search for anything...">
            <input type="submit" name="search_submit" value="SEARCH">
        </form>
        
        <section class="home-page">
            <h1>Available Newsletters for Subscription</h1>
            <?php
                $ssql="Select * from newsletters";
                $result= $conn->query($ssql);
                if ($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>
                        <!-- Web Service 1 -->
                        <div class="letter-item">
                            <div class="service_image">
                                <img src="<?php echo "images\\".$row['cover_photo']; ?>" alt="newspaper Image">
                            </div>
                            <div class="service-item">
                                <h3><?php echo $row['newsletter_title']; ?></h3>
                                <p><?php echo $row['newsletter_content']; ?></p>
                                <ul>
                                    <li>Published: <?php echo $row['publication_date']; ?></li>
                                    <li>Subscribers: <?php echo $row['subscribers']; ?></li>
                                </ul>
                            </div>
                        </div>
            <?php              
                    }
                }
            ?>
        </section>
        
    </section>

    <footer>
        <p>You are here: Newsletters</p>
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
