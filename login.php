<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="project.css">
    <title>Login Page</title>
</head>

<body>
    <?php
include 'dbcon.php';
if(isset($_POST['submit']))
{
	$email= $_POST['email'];
	$password= $_POST['password'];

	$email_search = "select * from registration where email='$email'";
	$query = mysqli_query($con,$email_search);

	$email_count = mysqli_num_rows($query);
	if($email_count)
	{
		$email_pass = mysqli_fetch_assoc($query);

		$db_pass = $email_pass['password'];

        $_SESSION['name'] = $email_pass['name'];
        
        $_SESSION['hobbies']=$email_pass['hobbies'];

		$pass_decode = password_verify($password, $db_pass);

		if($pass_decode)
		{
			// echo "login successful";
			?>
    <script>
    alert("login successful");
    location.replace("home.php");
    </script>
    <?php

		}
		else
		{
			?>
    <script>
    alert("Incorrect Password");
    location.replace("login.php");
    </script>
    <?php
		}
	}
	else
	{
        ?>
    <script>
    alert("Invalid Email");
    location.replace("login.php");
    </script>
    <?php
	}

}

?>
    <div class="backimg">
        <div class="form-box">
            <br>
            <h1>Log In</h1>
            <img src="icon.jpg" class="icon">



            <form class="input-group" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                <input name="email" type="text" class="input-field" placeholder="Email" required>
                <input name="password" type="Password" class="input-field" placeholder="Enter Password" required>
                <button type="submit" name="submit" class="submit-btn centre-btn">Log In</button>
                <br>
                <pre>      <small>Forgot Your Password? <a href="recover_email.php" class="forgot-pass">Click Here</a></small></pre>
                <hr>
                <p class="or">OR</p>
                <input type="button" class="register-btn centre-btn" value="Sign Up"
                    onclick="window.location.href='signup.php'" />
            </form>
        </div>
        <div class="navigation">
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>

</body>

</html>