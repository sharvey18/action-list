<?php include 'includes/db.php'; ?>
<?php include 'functions.php'; ?>

<?php

	if(isset($_POST) & !empty($_POST)){

		$username = mysqli_real_escape_string($connection, $_POST['username']);

		$query = "SELECT * FROM `users` WHERE username = '$username' ";

		$recoverUserPassword = mysqli_query($connection, $query);

		confirmQuery($recoverUserPassword);

		$count = mysqli_num_rows($recoverUserPassword);
		if($count == 1){
			echo "Send email to user with password";
		}else{
			echo "User name does not exist in database";
		}

		$r = mysqli_fetch_assoc($recoverUserPassword);
		echo $password = $r['user_password'];
		echo $to = $r['user_email'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login " . $password;
		$headers = "From : vivek@codingcyber.com";
		if(mail($to, $subject, $message, $headers)){
			echo " Your Password has been sent to your email id";
		}else{
			echo " Failed to Recover your password, try again";
		}



	}



 ?>


<form class="form-signin" method="POST">
  <h2 class="form-signin-heading">Forgot Password</h2>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
  <br />
  <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>
  <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
</form>
