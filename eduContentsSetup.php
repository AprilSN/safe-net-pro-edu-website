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
        <h1>Educational Article Setup Form</h1>

        <!-- Form to Create/Update Newsletter Features -->
        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <label for="title">Article Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Article Content:</label>
            <textarea id="content" name="content" rows="5" required></textarea>

            <label for="category">Article Category:</label>
            <input type="text" id="category" name="category" required>

            <label for="author">Author Name:</label>
            <input type="text" id="author" name="author" required>

            <label for="pub_date">Publication Date:</label>
            <input type="date" id="pub_date" name="pub_date" required>

            <label for="multimedia">Multimedia File:</label>
            <input type="file" id="multimedia" name="multimedia" required>

            <label for="status">Article Status:</label>
            <select id="status" name="status" required>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
                <option value="Archived">Archived</option>
            </select>

            <input type="submit" name="btn_upload" value="Upload Article">
        </form>
        
        <?php
        //Check Whether if i clicked the submit button
        if(isset($_POST['btn_upload']))
        {
            if(isset($_FILES["multimedia"]) && $_FILES["multimedia"]["error"]==0)
            {
                $filename = $_FILES["multimedia"]["name"];
                $filepath = $_FILES["multimedia"]["tmp_name"];
            
                //echo $filepath;
                $title = $_POST['title'];
                $content = $_POST['content'];
                $category = $_POST['category'];
                $author = $_POST['author'];
                $pub_date = $_POST['pub_date'];
                $status = $_POST['status'];

                //insert query prepare
                $ssql="INSERT INTO educational_contents (content_id, article_title, article_content, article_category, author_name, publication_date, multimedia_file, article_status) VALUES (Null, '$title', '$content', '$category', '$author', '$pub_date', '$filename', '$status')";
            
                // querying into the database '$conn'
                if($conn->query($ssql)==TRUE)
                {
                    move_uploaded_file($filepath,"images\\".$filename);
                }
            }
        }
        ?>

        <!-- Display Existing Articles -->
        <div class="retrieve_data">
            <h1>Article List</h1>
            <form class="form_search">
                <input type="text" id="search" name="search" placeholder="Search for anything...">
                <input type="submit" name="search_submit" value="SEARCH">
            </form>

            <?php
            if(isset($_GET['search_submit'])){
                $search=$_GET['search'];
                $ssql="Select * from educational_contents where article_title like '%$search%' OR article_content like '%$search%' OR article_category like '%$search%' OR author_name like '%$search%' OR article_status like '%$search%'";
                $result=$conn->query($ssql);
            }
            else{
                $ssql="Select * from educational_contents";
                $result= $conn->query($ssql);
            }
            if ($result->num_rows>0)
            {
            ?>    
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>Content ID</th>
                            <th>Article Title</th>
                            <th>Article Content</th>
                            <th>Article Category</th>
                            <th>Author Name</th>
                            <th>Publication Date</th>
                            <th>Article Multimedia</th>
                            <th>Article Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
            <?php        
                while($row=$result->fetch_assoc()){
            ?>
                    <tbody id="data-list">
                        <tr>
                            <td> <?php echo $row['content_id']; ?> </td>
                            <td> <?php echo $row['article_title']; ?> </td>
                            <td> <?php echo $row['article_content']; ?> </td>
                            <td> <?php echo $row['article_category']; ?> </td>
                            <td> <?php echo $row['author_name']; ?> </td>
                            <td> <?php echo $row['publication_date']; ?> </td>
                            <td> <img src="<?php echo "images\\".$row['multimedia_file']; ?>"></td>
                            <td> <?php echo $row['article_status']; ?> </td>
                            <td><a href="eduContentsEdit.php?content_ID=<?php echo $row['content_id'];?>"><img src="images/icons/edit.png" alt="Edit" title="Edit"></a> 
                            <a href="eduContentsDelete.php?content_ID=<?php echo $row['content_id'];?>"><img src="images/icons/delete.png" alt="Delete" title="Delete"></a></td>
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
                echo "There is no article uploaded.";
            }
        ?>
        </div>

            <!-- Display Existing Articles -->
           
    </section>

    <footer>
        <p>You are here: Articles Setup</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>  
    </footer> 

</body>

</html>
