<?php
require 'core.php';
require 'dbcon.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sin Up</title>
<link rel="stylesheet" type="text/css" href="css_signup.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
</head>
<body>

	<div id="form" class="form animated fadeIn" >
    	<h1>SIGN UP</h1><hr /><br /><br />
        <?php
			if(isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&isset($_POST['gender'])){
				$firstname=$_POST['first_name'];$lastname=$_POST['last_name'];$username=$_POST['username'];$email=$_POST['email'];$password=$_POST['password'];$confirm_password=$_POST['confirm_password'];$gender=$_POST['gender'];
				if(!empty($firstname)&&!empty($lastname)&&!empty($username)&&!empty($email)&&!empty($password)&&!empty($confirm_password)&&!empty($gender)){
					$username_query = "SELECT `id` FROM `users` WHERE `username`='$username'";
					$username_query_run = mysql_query($username_query);
					$username_query_rows = mysql_num_rows($username_query_run);
					if($username_query_rows!=0){
						echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						Username Already Exists</div>";}
					else{
						if($password==$confirm_password){
							$pass=md5($password);
							$query="INSERT INTO `mod`.`users` (`firstname`,`lastname`,`username`,`password`,
							`email`,`gender`) VALUES ('$firstname','$lastname','$username','$pass',
							'$email','$gender')";
							if(mysql_query($query)){
								echo "<html><div class=\"warning animated bounce\" style=\"color:#55D076;margin-bottom:10px;\">
						You are successfully registered. Please Log in</div>";
							}
							else {
								echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						There Was A Problem Signing You Up.Please Try Again</div>";
							}
						}
						else {
							echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						Password Confirmation Failed</div>";
						}
				}}
				else {
					echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						Please Fill In All Fields</div>";}
			}

		?>
        
        <form action="signup.php" method="POST">
        First Name<br/><input type="text" id="first_name" name="first_name" /><br /><br />
        Last Name<br/><input type="text" id="last_name" name="last_name" /><br /><br />
        Username<br/><input type="text" id="username" name="username" /><br /><br />
        Email-address<br/><input type="email" id="email" name="email" /><br /><br />
        Password<br/><input type="password" id="password" name="password" /><br /><br />
        Confirm Password<br/><input type="password" id="confirm_password" name="confirm_password" /><br /><br />
        Gender<select id="gender" name="gender"></option> <option>Male</option><option>Female</option></select><br /><br />
        <input type="submit" id="button" value="Sign Up" />
        </form>
        
        <div id="footer">
           Already a member ?<a href="login.php"> Log in</a>
        </div>
        
    </div>
    
</body>
</html>
