<!DOCTYPE html>
<html lang="en">    
    <?php
        include 'connection.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Educational Contents Update</title>
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
        <?php
            if(isset($_GET['content_ID']))
            {
                $cont_id=$_GET['content_ID'];
                $ssql="Select * from educational_contents where content_id='$cont_id'";
                $result= $conn->query($ssql);
                $row=$result->fetch_assoc();
            }
        ?>
        <h1>Educational Article Update Form</h1>
        <form class="setup-form" action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="art_ID" value="<?php echo $row['content_id'];?>" required>
                
            <label for="title">Article Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $row['article_title'];?>" required>

            <label for="content">Article Content:</label>
            <textarea id="content" id="content" name="content" rows="5" required>"<?php echo $row['article_content'];?>"</textarea>
            
            <label for="category">Article Category:</label>
            <input type="text" id="category" name="category" value="<?php echo $row['article_category'];?>" required>

            <label for="author">Author Name:</label>
            <input type="text" id="author" name="author" value="<?php echo $row['author_name'];?>" required>

            <label for="pub_date">Publication Date:</label>
            <input type="date" id="pub_date" name="pub_date" value="<?php echo $row['publication_date'];?>" required>

            <label for="multimedia">Multimedia File:</label>
            <input type="file" id="multimedia" name="multimedia" required>

            <label for="status">Article Status:</label>
            <select name="status" id="art_status">
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
                <option value="Archived">Archived</option>
            </select>

            <input type="submit" name="btn_update" value="Update Article">
        </form>
        <?php
        //Check Whether if i clicked the submit button
            if(isset($_POST['btn_update']))
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
                $ssql="Update educational_contents set article_title='$title', article_content='$content', article_category='$category', author_name='$author', publication_date='$pub_date', multimedia_file='$filename', article_status='$status' where content_id='$cont_id'";
                
                    // querying into the database '$conn'
                    if($conn->query($ssql)==TRUE)
                    {
                        move_uploaded_file($filepath,"images\\".$filename);
                        header("location:eduContentsSetup.php");
                    }
                }
            }
        ?>
    </section>

    <footer>
        <p>You are here: Articles Edit</p>
        <p>&copy; 2024 SafeNet Pro SMC Ltd. All rights reserved.</p>   
    </footer> 
</body>
</html>