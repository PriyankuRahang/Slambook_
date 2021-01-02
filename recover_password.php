<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'project.php' ?>
	<title>Recovery page</title>
</head>
<body>
 <?php  

         include 'dbcon.php';

        if(isset($_POST['submit'])){
           
            $email = mysqli_real_escape_string($con, $_POST['email']) ;

            $emailquery = " select * from registration where email ='$email' ";
            $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);
            if($emailcount){
               	
               	$userdata=mysqli_fetch_array($query);

               	$name=$userdata['name'];
               	$token=$userdata['token'];

               	$subject="Password Reset";
				$body="Hi, $name. Click here to reset your password http://localhost/project/reset_password.php?token=$token ";
				$sender_email="From: ahadurrashid2@gmail.com";

			if(mail($email, $subject, $body, $sender_email)){
				 ?>
                                <script>
                                    alert("Check your mail to reset your passsword");
                                    window.location.href="login.php";
                                </script>
                            <?php
				
			}else{
				echo "Email sending fail...";
			}

                   

                }else{
                	echo "No email found";
                }
            
            
}


?>
	<div class="backimg">
		<div class="form-box-recovery">
			<br><h2>Recover Password</h2>
			<img src="icon.jpg" class="icon-recovery">
			<form class="input-group" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
				<input name="email" type="text" class="input-field-recovery" placeholder="Enter your Email" required>
				<button type="submit" name="submit" class="submit-btn-recovery">Send Mail</button>
			</form>
		</div>
	</div>
	<script>
                if(window.history.replaceState){
                    window.history.replaceState(null,null,window.location.href);
                }
            </script>
</body>

</html>