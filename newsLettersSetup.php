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
    <title>SMC Ltd. - Newsletter Features</title>
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
        <h1>Newsletter Setup Form</h1>
    
        <!-- Form to Create/Update Newsletter Features -->
        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <label for="title">Newsletter Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Newsletter Content:</label>
            <textarea id="content" name="content" rows="5" required></textarea>
			
			<label for="pub_date">Publication Date:</label>
            <input type="date" id="pub_date" name="pub_date" required>

            <label for="subcribers">Subcribers:</label>
            <input type="text" id="subcribers" name="subcribers" required>
            
            <label for="cover">Cover Photo:</label>
            <input type="file" id="cover" name="cover" required>
            
            <input type="submit" name="btn_upload" value="Upload Newsletter">
        </form>

        <?php
        if(isset($_POST['btn_upload']))
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

                //insert query
                $ssql="INSERT INTO newsletters (newsletter_id, newsletter_title, newsletter_content, publication_date, subscribers, cover_photo) VALUES (Null, '$title', '$content', '$pub_date', '$subscribers', '$filename')";
            
                // query into the database 
                if($conn->query($ssql)==TRUE)
                {
                    move_uploaded_file($filepath,"images\\".$filename);
                }
            }
        }
        ?>

        <!-- Display Existing Newletters Feature -->
        <div class="retrieve_data">
            <h1>Newsletter List</h1>
            <form class="form_search">
                <input type="text" id="search" name="search" placeholder="Search for anything...">
                <input type="submit" name="search_submit" value="SEARCH">
            </form>
            <?php
            if(isset($_GET['search_submit'])){
                $search=$_GET['search'];
                $ssql="Select * from newsletters where newsletter_title like '%$search%' OR newsletter_content like '%$search%'";
                $result=$conn->query($ssql);
            }
            else{
                $ssql="Select * from newsletters";
                $result= $conn->query($ssql);
            }
            if ($result->num_rows>0)
            {
            ?>    
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>Newsletter ID</th>
                            <th>Newsletter Title</th>
                            <th>Newsletter Content</th>
                            <th>Publication Date</th>
                            <th>Subscribers</th>
                            <th>Cover Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            <?php        
                while($row=$result->fetch_assoc()){
            ?>
                    <tbody id="data-list">
                        <tr>
                            <td> <?php echo $row['newsletter_id']; ?> </td>
                            <td> <?php echo $row['newsletter_title']; ?> </td>
                            <td> <?php echo $row['newsletter_content']; ?> </td>
                            <td> <?php echo $row['publication_date']; ?> </td>
                            <td> <?php echo $row['subscribers']; ?> </td>
                            <td> <img src="<?php echo "images\\".$row['cover_photo']; ?>"></td>
                            <td><a href="newsLettersEdit.php?newsletter_ID=<?php echo $row['newsletter_id'];?>"><img src="images/icons/edit.png" alt="Edit" title="Edit"></a>
                            <a href="newsLettersDelete.php?newsletter_ID=<?php echo $row['newsletter_id'];?>"><img src="images/icons/delete.png" alt="Delete" title="Delete"></a></td>
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
                echo "There is no newsletter uploaded.";
            }
            ?>
        </div>
            <!-- Display Existing Articles -->
           
    </section>

    <footer>
        <p>You are here: Newsletters Setup</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>

</html>
