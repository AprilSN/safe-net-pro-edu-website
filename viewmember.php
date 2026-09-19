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
        <h1>Membership User List</h1>
        <!-- Display Existing Newletters Feature -->
        <div class="retrieve_data">
            <form class="form_search">
                <input type="text" id="search" name="search" placeholder="Search for anything...">
                <input type="submit" name="search_submit" value="SEARCH">
            </form>
            <?php
            if(isset($_GET['search_submit'])){
                $search=$_GET['search'];
                $ssql="Select * from user_account where full_name like '%$search%' OR email_address like '%$search%' OR user_name like '%$search%' OR newsletter_preference like '%$search%' AND user_type='MEMBER'";
                $result=$conn->query($ssql);
            }
            else{
                $ssql="Select * from user_account where user_type='MEMBER'";
                $result= $conn->query($ssql);
            }
            if ($result->num_rows>0)
            {
            ?>
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>User Name</th>
                            <th>Registration Date</th>
                            <th>Subscription Status</th>
                            <th>Profile Picture</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
            <?php            
                    while($row=$result->fetch_assoc()){
            ?>
                    <tbody id="data-list">
                        <tr>
                            <td> <?php echo $row['user_id']; ?> </td>
                            <td> <?php echo $row['full_name']; ?> </td>
                            <td> <?php echo $row['email_address']; ?> </td>
                            <td> <?php echo $row['user_name']; ?> </td>
                            <td> <?php echo $row['registration_date']; ?> </td>
                            <td> <?php echo $row['subscription_status']; ?> </td>
                            <td> <img src="<?php echo "images\\".$row['profile_picture']; ?>"></td>
                            <td><a href="membershipEdit.php?user_ID=<?php echo $row['user_id'];?>"><img src="images/icons/edit.png" alt="Edit" title="Edit"></a></td>
                        </tr>
                    </tbody>
            <?php                
                    }
            ?>            
                </table>
            <?php
            }
            else
            {
                echo "There is no registered member.";
            }
            ?>
        </div>
        <!-- Display Existing Articles -->     
    </section>

    <footer>
        <p>You are here: Membership View</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>

</html>
