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
    <title>SMC Ltd. - Home</title>
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
        <!-- <form class="search_bar">
            <input class="search-input" type="text" placeholder="Search...">
            <input class="search-button" type="submit" value="SEARCH">
        </form> -->
        <form class="form_search">
            <input type="text" id="search" name="search" placeholder="Search for anything...">
            <input type="submit" name="search_submit" value="SEARCH">
        </form>

        <section class="home-page">
            <h1>Online Safety Education</h1>

            <div class="service-container">
                <?php
                    $ssql="Select * from educational_contents";
                    $result= $conn->query($ssql);
                    if ($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                ?>
                            <!-- Web Service 1 -->
                            <div class="service-card">
                                <div class="service_multi">
                                    <img src="<?php echo "images\\".$row['multimedia_file']; ?>" alt="Web Service 1">
                                </div>
                                <div class="service-info">
                                    <h3><?php echo $row['article_title']; ?></h3>
                                    <p> <?php echo $row['article_content']; ?> </p>
                                    <ul>
                                        <li>Category: <?php echo $row['article_category']; ?></li>
                                        <li>Author: <?php echo $row['author_name']; ?></li>
                                        <li>Published: <?php echo $row['publication_date']; ?></li>
                                    </ul>
                                </div>
                                <form class="setup-form" action="" method="POST">
                                    <input type="submit" name="more" value="Learn More">
                                </form>
                            </div>
                <?php               
                        }
                    }
                ?>
            </div>
            <br>
            <hr>       
            <h1>Web Services</h1>
            <section class="web-service">
                <?php
                $ssql="Select * from web_services";
                $result= $conn->query($ssql);
                if ($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                ?>
                        <!-- Web Service 1 -->
                        <div class="letter-item">
                            <div class="service_image">
                                <img src="<?php echo "images\\".$row['webservice_image']; ?>" alt="Service 1 Image">
                            </div>
                            <div class="service-item">
                                <div class="service-body">
                                    <h3><?php echo $row['webservice_name']; ?></h3>
                                    <p><?php echo $row['webservice_content']; ?></p>
                                    <span>***<?php echo $row['webservice_info']; ?></span>
                                </div>
                                <form class="setup-form" action="" method="POST">
                                    <input type="submit" name="more" value="Learn More">
                                </form>
                            </div>
                        </div>
                <?php              
                    }
                }
                ?>
            </section>
            <br>
            <hr>  
            <h1>Social Media Profiles</h1>
                <section class="featured-content">
                    <?php
                        $ssql="Select * from socialmedia_profiles";
                        $result= $conn->query($ssql);
                        if ($result->num_rows>0)
                        {
                            while($row=$result->fetch_assoc())
                            {
                    ?>
                                <a href="<?php echo $row['profile_url']?>" class="featured-item">
                                    <img src="<?php echo "images\\".$row['platform_logo']; ?>" alt="SNS Profile">
                                    <p><?php echo $row['platform_name']; ?> : <?php echo $row['profile_name']; ?></p>
                                </a>
                    <?php              
                            }
                        }
                    ?>
                </section>
            <br>    
            <hr>
            <h1>Top Safety Tips</h1>
            <div class="safety-tips">
                <ul>
                    <li>
                        <strong>Set Strong Passwords:</strong>
                        <p>Ensure each social media account has a unique and strong password. Use a combination of letters, numbers, and symbols.</p>
                    </li>
                    <li>
                        <strong>Review Privacy Settings:</strong>
                        <p>Regularly check and adjust the privacy settings on your social platforms to control who can see your information and posts.</p>
                    </li>
                    <li>
                        <strong>Think Before Sharing:</strong>
                        <p>Be cautious about sharing personal information online. Think twice before posting details such as your address, phone number, or financial information.</p>
                    </li>
                    <li>
                        <strong>Report Suspicious Behavior:</strong>
                        <p>If you encounter any suspicious or inappropriate behavior, report and block the user. Prioritize your safety and the safety of others.</p>
                    </li>
                    <li>
                        <strong>Verify Requests:</strong>
                        <p>Verify friend requests and follow requests. Ensure you know the person before accepting connections on social media.</p>
                    </li>
                    <li>
                        <strong>Be Mindful of Phishing:</strong>
                        <p>Avoid clicking on suspicious links or providing personal information in response to unsolicited messages. Be aware of phishing attempts.</p>
                    </li>
                    <li>
                        <strong>Stay Informed:</strong>
                        <p>Stay informed about the latest trends and risks on social media. Regularly educate yourself on online safety practices.</p>
                    </li>
                </ul>
            </div>
        </section>
        
    </section>

    <footer>
        <p>You are here: Legislations</p>
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
