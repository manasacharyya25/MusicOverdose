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
<link rel="stylesheet" type="text/css" href="css_add.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css" />
<link rel="stylesheet" type="text/css" href="css/hover.css" />
</head>

<body>
	
<div id="wrapper">
    
    	<div id="add_video">
        <?php
							if(isset($_POST['code'])&&isset($_POST['name'])&&isset($_POST['about'])&&isset($_POST['lyrics'    							])){
								$code=$_POST['code'];$name=$_POST['name'];$about=$_POST['about'];$lyrics=$_POST['lyrics'];
								
								$url="http://youtube.com/embed/".$code;
								
								if(!empty($code)&&!empty($name)){
									if(mysql_query("INSERT INTO `videos` (`user_id`,`url`,`name`,`about`,`lyrics`) VALUES     									('$user_id','$url','$name','$about','$lyrics')")){
										header('Location:home.php');}
										else{echo mysql_error();}		
								}else{echo mysql_error();}
							}else{echo mysql_error();}
							?>
							<form action="add.php" method="POST">
                                <input type="text" placeholder="Enter Video Code" required name="code" ><br /><input type="text" name="name" placeholder="Name Of The Video" required><br /><textarea  placeholder="About The Video" name="about" ></textarea><br /><textarea height="auto" placeholder="Lyrics" name="lyrics" ></textarea><br />
                                <input type="submit" name="submit" id="button" value="Add Video">
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