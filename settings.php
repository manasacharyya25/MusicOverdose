<?php
	require 'core.php';
	require 'dbcon.php';
	require 'session.php';
	$user_id=$_SESSION['user_id'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="css_settings.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css" />
<link rel="stylesheet" type="text/css" href="css/hover.css" />
</head>

<body>
<div id="wrapper">
    
    	<div id="change_username">
        	<?php
			if(isset($_POST['username'])&&!empty($_POST['username'])){
				$username=$_POST['username'];
				
				$username_query = "SELECT `id` FROM `users` WHERE `username`='$username'";
				$username_query_run = mysql_query($username_query);
				$username_query_rows = mysql_num_rows($username_query_run);
				if($username_query_rows!=0){
					echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">			Username Already Exists</div>";}
				else{
						$query="UPDATE `users` SET `username`='$username' WHERE `id`='$user_id'";
						if(mysql_query($query)){
								echo "<html><div class=\"warning animated bounce\" style=\"color:#55D076;margin-bottom:10px;\">
						Username Successfully Changed</div>";
							}
							else {
								echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						There Was A Problem Updating Your Username.Please Try Again</div>";
							}}}
						
?>
        
        <form action="settings.php" method="POST">
        
       
        <input type="text" id="username" name="username" placeholder="Change Username" required />
        <input type="submit" id="button" value="Update" />
        </form>
        
        </div>
        
        <div id="change_password">
        	<?php
				
				if(isset($_POST['current_pass'])&&isset($_POST['new_pass'])&&isset($_POST['confirm_new_pass'])){
				$current_pass=$_POST['current_pass'];$new_pass=$_POST['new_pass'];
				$confirm_new_pass=$_POST['confirm_new_pass'];$password=getfield('password');
				
				if($password==md5($current_pass)){
					if($new_pass==$confirm_new_pass){
						$pass=md5($new_pass);
						$password_query = "UPDATE `users` SET `password`='$pass' WHERE `id`='$user_id'";
						if(mysql_query($password_query)){
							echo "<html><div class=\"warning animated bounce\" style=\"color:#55D076;margin-bottom:10px;\">
						Password Successfully Changed</div>";
						}
						else{
							echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						There Was A Problem Updating Your Password.Please Try Again</div>";
							}
					}
					else {
						echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						Password Confirmation Failed</div>";
						}
				}
				else {
					echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						Current Password Did Not Match</div>";
					}}
		?>
        
        <form action="settings.php" method="POST">
        <input type="password" id="current_pass" name="current_pass" placeholder="Current Password" required /><br />
        <input type="password" id="new_pass" name="new_pass" placeholder="New Password" required /><br />
        <input type="text" id="confirm_new_pass" name="confirm_new_pass" placeholder="Confirm New Password" required /><br /><br /><input type="submit" id="button" value="Change Password" />
        </form>
			
        </div>
        
        <div id="change_email">
        
        	<?php
			if(isset($_POST['email'])&&!empty($_POST['email'])){
				$email=$_POST['email'];
				
				$email_query="UPDATE `users` SET `email`='$email' WHERE `id`='$user_id'";
				if(mysql_query($email_query)){
								echo "<html><div class=\"warning animated bounce\" style=\"color:#55D076;margin-bottom:10px;\">
						Email Address Successfully Changed</div>";
							}
							else {
								echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						There Was A Problem Updating Your Email Address.Please Try Again</div>";
							}}
						
?>
        
        <form action="settings.php" method="POST">
        
       
        <input type="email" id="email" name="email" placeholder="Change Email Address" required />
        <input type="submit" id="button" value="Update" />
        </form>
        
        
        </div>
    
    	<div id="social">
        	<?php
            if(isset($_POST['email'])){
				$email=$_POST['email'];
				
				$email_query="UPDATE `users` SET `email`='$email' WHERE `id`='$user_id'";
				if(mysql_query($email_query)){
								echo "<html><div class=\"warning animated bounce\" style=\"color:#55D076;margin-bottom:10px;\">
						Email Address Successfully Changed</div>";
							}
							else {
								echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						There Was A Problem Updating Your Email Address.Please Try Again</div>";
							}}
						
?>
        <?php
		
			if(isset($_POST['social_submit'])){
				$fb=$_POST['fb'];$twitter=$_POST['twitter'];$insta=$_POST['insta'];$youtube=$_POST['youtube'];$google=$_POST['google'];$flickr=$_POST['flickr'];
				$social_query="UPDATE `users` SET `fb`='$fb',`twitter`='$twitter',`insta`='$insta',
				`youtube`='$youtube',`google`='$google',`flicker`='$flickr'WHERE `id`='$user_id'";
				if(mysql_query($social_query)){
					echo "<html><div class=\"warning animated bounce\" style=\"color:#55D076;margin-bottom:10px;\">
						Social Accounts Successfully Connected</div>";
							}
							else {
								echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
						There Was A Problem Connecting With Your Social Accounts.Please Try Again</div>";
							}}
		?>
        
        <form action="settings.php" method="POST">
            <input type="url" name="fb" placeholder="Connect Your Facebook Account"  />
            <input type="url" name="twitter" placeholder="Connect Your Twitter Account"  />
            <input type="url" name="insta" placeholder="Connect Your Instagram Account"  />
            <input type="url" name="youtube" placeholder="Connect Your Youtube Channel"  />
            <input type="url" name="google" placeholder="Connect Your Google+ Account"  />
            <input type="url" name="flickr" placeholder="Connect Your Flickr Account"  /><br />
            <input type="submit" id="button" name="social_submit" value="Update" />
        </form>
        </div>
    </div>
    
    <nav id="nav" class="nav animated slideInDown">
    	<ul>
        	<li><a href="home.php"><img src="nav/home.png" height=20px/>Home</a></li>
            <li><a href="profile.php"><img src="nav/profile.png" height=20px/>Profile</a></li>
            <li><a href="events.php"><img src="nav/events.png" height=20px/>Events</a></li>
            <li><a href="friends.php"><img src="nav/friends.png" height=20px/>Friends</a></li>
            <li><a href="messages.php"><img src="nav/messages.png" height=20px/>Messages</a></li>
            <li><a href="settings.php"><img src="nav/settings.png" height=20px/>Settings</a></li>
            <li><a href="logout.php"><img src="nav/logout.png" height=20px/>Logout</a></li>
        </ul>
        <div id="seperator"></div>
       </nav>

</body>
</html>