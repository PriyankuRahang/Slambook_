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

        	if(isset($_GET['token'])){

        	$token=$_GET['token'];
           
            $newpassword = mysqli_real_escape_string($con, $_POST['password']) ;
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']) ;

            $pass = password_hash($newpassword, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

           
            if($newpassword === $cpassword){

            	$updatequery=" update registration set password='$pass' where token='$token' ";
               	
               $iquery =mysqli_query($con, $updatequery);
               if($iquery){
                        //  $_SESSION['msg'] = "Your password has been updated";
                        ?>
    <script>
    alert("Your password has been updated");
    header('location:login.php');
    </script>
    <?php
                        //  header('location:login.php');
               		

               }else{

               	
                    $_SESSION['msg'] = "Your password has not been updated";
               		header('location:reset_password.php');

               }
      }else{
          
        $_SESSION['msg'] = "Your password is not matching";
               	
  		}
    }

}
else{
    	echo "No token found";
    }
?>
    <div class="backimg">
        <div class="form-box-reset">
            <br>
            <h2>Recover Password</h2>
            <img src="icon.jpg" class="icon-recovery">
            <p> <?php
            if(isset($_SESSION['passmsg']))
            {
                echo $_SESSION['passmsg'];           
            }
            else
            {
                echo $_SESSION['passmsg']= "";    
            }
            
            ?></p>
            <br>
            <form class="input-group" action="" method="POST">
                <input name="password" type="text" class="input-field-recovery" placeholder="New Password" required>
                <input name="cpassword" type="text" class="input-field-recovery" placeholder="Confirm Password"
                    required>
                <button type="submit" name="submit" class="submit-btn-reset">Update Password</button>
            </form>
        </div>
    </div>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>