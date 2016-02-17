<?php
require 'core.php';
require 'dbcon.php';
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
	header('Location:home.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css_signup.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
</head>

<body>
	<div id="form" class="form animated fadeIn">
    	<h1>Log in</h1><hr /><br /><br />
		<?php
		if(isset($_POST['username'])&&isset($_POST['password'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
    
		if(!empty($username)&&!empty($password)){
			$pass=md5($password);
			$query = "SELECT `id` FROM `users` WHERE `username`='$username' && `password`='$pass'";
			if($query_run = mysql_query($query)){
				$query_run_rows=mysql_num_rows($query_run);
				if($query_run_rows!=0){
					$user_id=mysql_result($query_run,0,`id`);
					$_SESSION['user_id']=$user_id;
					header('Location:home.php');
					}
				else {
					echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
					Invalid Username/Password Combination</div>";}
					}}
				else {
					echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
					Please Fill In All Fields</div>";}}  
					
		
		?>
		<form action="login.php" method="POST">
        Username<br/><input type="text" id="username" name="username" /><br /><br />
        Password<br/><input type="password" id="password" name="password" /><br /><br />
        <input type="submit" id="button" value="Log in" />
        </form>
        
        <div id="footer">
          Not a member yet ?<a href="signup.php"> Sign Up</a>
        </div>
        
      </div>
</body>
</html>