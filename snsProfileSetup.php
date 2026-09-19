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
    <title>SMC Ltd. - SNS Profiles</title>
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
        <h1>SNS-Profiles Setup Form</h1>
    
        <!-- Form to Create/Update Newsletter Features -->
        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <label for="profile">Profile Name:</label>
            <input type="text" id="profile" name="profile" required>

			<label for="url">Profile URL:</label>
            <input type="text" id="url" name="url" required>

            <label for="platform">Platform Name:</label>
            <input type="text" id="platform" name="platform" required>
            
            <label for="logo">Platform Logo:</label>
            <input type="file" id="logo" name="logo" required>
            
            <input type="submit" name="btn_upload" value="Upload Social Media Profile">
        </form>

        <?php
        //Check Whether if i clicked the submit button
        if(isset($_POST['btn_upload']))
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
                $ssql="INSERT INTO socialmedia_profiles (profile_id, profile_name, profile_url, platform_name, platform_logo) VALUES (NULL, '$profile', '$url', '$platform', '$filename')";
                // querying into the database '$conn'
                if($conn->query($ssql)==TRUE)
                {
                    move_uploaded_file($filepath,"images\\".$filename);
                }
            }
        }
        ?>

        <!-- Display Existing Newletters Feature -->
        <div class="retrieve_data">
            <h1>SNS-Profile List</h1>
            <form class="form_search">
                <input type="text" id="search" name="search" placeholder="Search for anything...">
                <input type="submit" name="search_submit" value="SEARCH">
            </form>

            <?php
            if(isset($_GET['search_submit'])){
                $search=$_GET['search'];
                $ssql="Select * from socialmedia_profiles where profile_name like '%$search%' OR platform_name like '%$search%'";
                $result=$conn->query($ssql);
            }
            else{
                $ssql="Select * from socialmedia_profiles";
                $result= $conn->query($ssql);
            }
            if ($result->num_rows>0)
            {
            ?>
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>Profile ID</th>
                            <th>Profile Name</th>
                            <th>Profile URL</th>
                            <th>Platform Name</th>
                            <th>Platform Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            <?php        
                    while($row=$result->fetch_assoc()){
            ?>
                    <tbody id="data-list">
                    <tr>
                        <td> <?php echo $row['profile_id']; ?> </td>
                        <td> <?php echo $row['profile_name']; ?> </td>
                        <td> <?php echo $row['profile_url']; ?> </td>
                        <td> <?php echo $row['platform_name']; ?> </td>
                        <td> <img src="<?php echo "images\\".$row['platform_logo']; ?>"></td>
                        <td><a href="snsProfileEdit.php?profile_ID=<?php echo $row['profile_id'];?>"><img src="images/icons/edit.png" alt="Edit" title="Edit"></a>
                        <a href="snsProfileDelete.php?profile_ID=<?php echo $row['profile_id'];?>"><img src="images/icons/delete.png" alt="Delete" title="Delete"></a></td>
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
                echo "There is no social-media profiles uploaded.";
            }
            ?>
        </div>
            <!-- Display Existing Articles -->
           
    </section>

    <footer>
        <p>You are here: SNS-Profiles Setup</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>

</html>
