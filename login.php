<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Login</title>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="information.php">Information</a></li>
                    <li><a href="guidelines.php">Legislations</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>    
        </div>
    </header>

    <section class="login-container">
        <form class="setup-form" action="login-success.php" method="Post">
            <h2>Login</h2>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="btn_submit" value="LOGIN">
        </form>
        Not a Member? <a href="membership.php">Click to REGISTER</a>
    </section>

    <footer>
        <p>You are here: Login</p>
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
