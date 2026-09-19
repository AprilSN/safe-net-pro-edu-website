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
    <title>SMC Ltd. - Web Services</title>
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
        <h1>Web-Service Setup Form</h1>
    
        <!-- Form to Create/Update Newsletter Features -->
        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <label for="name">Web Service Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="content">Web Service Content:</label>
            <textarea id="content" name="content" rows="5" required></textarea>

            <label for="info">Web Service Info:</label>
            <textarea id="info" name="info" rows="3" required></textarea>
            
            <label for="image">Web Service Image:</label>
            <input type="file" id="image" name="image" required>
            
            <input type="submit" name="btn_upload" value="Upload Webservice">
        </form>

        <?php
        //Check Whether if i clicked the submit button
        if(isset($_POST['btn_upload']))
        {
            if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0)
            {
                $filename = $_FILES["image"]["name"];
                $filepath = $_FILES["image"]["tmp_name"];
            
                //echo $filepath;
                $name = $_POST['name'];
                $content = $_POST['content'];
                $info = $_POST['info'];

                //insert query prepare
                $ssql="INSERT INTO web_services (webservice_id, webservice_name, webservice_content, webservice_info, webservice_image) VALUES (NULL, '$name', '$content', '$info', '$filename')";
            
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
            <h1>Web-Service List</h1>
            <form class="form_search">
                <input type="text" id="search" name="search" placeholder="Search for anything...">
                <input type="submit" name="search_submit" value="SEARCH">
            </form>
            <?php
            if(isset($_GET['search_submit'])){
                $search=$_GET['search'];
                $ssql="Select * from web_services where webservice_name like '%$search%' OR webservice_content like '%$search%' OR webservice_info like '%$search%'";
                $result=$conn->query($ssql);
            }
            else{
                $ssql="Select * from web_services";
                $result= $conn->query($ssql);
            }
            if ($result->num_rows>0)
            {
            ?>
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>Web Service ID</th>
                            <th>Web Service Name</th>
                            <th>Web Service Content</th>
                            <th>Web Service Image</th>
                            <th>Web Service Info</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
            <?php        
                    while($row=$result->fetch_assoc()){
            ?>
                    <tbody id="data-list">
                        <tr>
                            <td> <?php echo $row['webservice_id']; ?> </td>
                            <td> <?php echo $row['webservice_name']; ?> </td>
                            <td> <?php echo $row['webservice_content']; ?> </td>
                            <td> <img src="<?php echo "images\\".$row['webservice_image']; ?>" width="100px" height="100px"></td>
                            <td> <?php echo $row['webservice_info']; ?> </td>
                            <td><a href="webservicesEdit.php?service_ID=<?php echo $row['webservice_id'];?>"><img src="images/icons/edit.png" alt="Edit" title="Edit"></a> 
                            <a href="webservicesDelete.php?service_ID=<?php echo $row['webservice_id'];?>"><img src="images/icons/delete.png" alt="Delete" title="Delete"></a></td>
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
                echo "There is no webservice uploaded.";
            }
            ?>
        </div>
            <!-- Display Existing Articles -->
           
    </section>

    <footer>
        <p>You are here: Web-Services Setup</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>

</html>
