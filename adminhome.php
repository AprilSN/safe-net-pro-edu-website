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
    <title>SMC Ltd. - Educational Contents</title>
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
        <div class="manage_website">
            <h1>Website Contents Management</h1>
            <div class="management_container">
                <div class="management-row">
                    <!-- Educational Content Section -->
                    <a href="eduContentsSetup.php">
                        <div class="management_col">
                            <h3>Educational Contents</h3>
                            <p>Manage educational articles here.</p>
                            <!-- Add specific education content for safety guide-->
                        </div>
                    </a>
                    
                    <!-- Newsletter Features Section -->
                    <a href="newsLettersSetup.php">
                        <div class="management_col">
                            <h3>Newsletter Features</h3>
                            <p>Manage newsletters here.</p>
                            <!-- Add specific functionality/content for newsletter features -->
                        </div>
                    </a>
                </div>
                <div class="management-row">
                    <!-- Educational Content Section -->
                    <a href="webservicesSetup.php">
                        <div class="management_col">
                            <h3>Web Services</h3>
                            <p>Manage web services here.</p>
                            <!-- Add specific education content for safety guide-->
                        </div>
                    </a>
                    
                    <!-- Newsletter Features Section -->
                    <a href="snsProfileSetup.php">
                        <div class="management_col">
                            <h3>SNS Profiles</h3>
                            <p>Manage sns profiles here.</p>
                            <!-- Add specific functionality/content for newsletter features -->
                        </div>
                    </a>
                </div>
                <div class="management-row">
                    <!-- Educational Content Section -->
                    <a href="viewmember.php">
                        <div class="management_col">
                            <h3>Memberships</h3>
                            <p>View member users here.</p>
                            <!-- Add specific education content for safety guide-->
                        </div>
                    </a>
                    
                    <!-- Newsletter Features Section -->
                    <a href="supportInfo.php">
                        <div class="management_col">
                            <h3>Support Info</h3>
                            <p>Help & support users here.</p>
                            <!-- Add specific functionality/content for newsletter features -->
                        </div>
                    </a>
                </div>  
            </div>
        </div>
    </section>

    <footer>
        <p>You are here: Home</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>   
    </footer> 

</body>

</html>
