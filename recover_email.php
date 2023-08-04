<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Slambook</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    
        include 'dbcon.php';
        
        if(isset($_POST['submit']))
        {
            // $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            // $password = mysqli_real_escape_string($con, $_POST['password']);
            // $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

            // $pass = password_hash($password, PASSWORD_BCRYPT);
            // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            // $token=bin2hex(random_bytes(15));

                $emailquery = "select * from registration where email='$email' ";
                $query = mysqli_query($con,$emailquery);
                $emailcount = mysqli_num_rows($query);
                // if ($emailcount>0 && $password !== $cpassword) {
                    // echo "Email already exist and Password is also not matching";
                // } 
            
                if($emailcount)
                {
                    $userdata = mysqli_fetch_array($query);
                    $name = $userdata['name'];
                    $token = $userdata['token'];
                    $subject = "Password Reset";
                    $body = "HI, $name. Click here to reset your password
                    http://localhost/reset_password.php?token=$token";
                    $sender_email= "From: rahangpriyanku@gmail.com";
                    if(mail($email, $subject, $body, $sender_email))
                    {
                        $_SESSION['msg'] = "Check your mail to reset your password $email";
                        header('location:login.php');
                    }
                    else
                    {
                        echo "Sending failed";
                    }
                }
               else
               {
                   echo "No email found";
               }
                
        }

    ?>
    <div class="sign-up-form">
        <img src="icon.jpg" class="icon">
        <h1>Recover your account</h1>
        <p>Please fill your email-id properly</p>
        <hr>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="input-group">
            <!-- <input type="text" placeholder="Enter your name" name="name" class="input-box" required>  -->
            <input type="text" placeholder="Enter your email-id" name="email" class="input-box" required>
            <!-- <input type="password" placeholder="Enter your password" name="password" class="input-box" required> -->
            <!-- <input type="password" placeholder="Re-enter your password" name="cpassword" class="input-box" required> -->
            <button type="submit" name="submit" class="signup-btn">Send Mail</button>
            <!-- <input type="button" name="cancel" class="back-btn" value="Login" onclick="window.location.href='login.php'"/> -->
        </form>
    </div>

</body>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

</html>