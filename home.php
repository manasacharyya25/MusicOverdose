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
<title>Home</title>
<link rel="stylesheet" type="text/css" href="css_home.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css" />
<link rel="stylesheet" type="text/css" href="css/hover.css" />
</head>

<body>
       
    <header id="header">
        	<?php
				$user_id=$_SESSION['user_id'];
				if(isset($_POST['post'])&&!empty($_POST['post'])){
					$post=$_POST['post'];
					
					$query="INSERT INTO `posts` (`user_id`,`post`,`like`) VALUES ('$user_id','$post','0')";
					if(mysql_query($query)){
						header('Location:home.php');
					}}
			?>
            <form action="home.php" method="POST">
            	<textarea id="share_text" name="post" placeholder="Share your thoughts!"></textarea>
            	<input type="submit" id="update_share">
            </form>
            
            <!--****************************	OPEN A LINK IN NEW TAB (target="_blank")	*******************!-->	
        		<div id="fb_link">
                    <ul>
                        <li><a href="<?php echo getfield('fb'); ?>" target="_blank"><img src="images/fb.png" height="25px"/></a></li>
                        <li><a href="<?php echo getfield('twitter'); ?>" target="_blank"><img src="images/twitter.png" height="25px" /></a></li>
                        <li><a href="<?php echo getfield('insta'); ?>" target="_blank"><img src="images/insta.jpg" height="25px"/></a></li>
                        <li><a href="<?php echo getfield('youtube'); ?>" target="_blank"><img src="images/utube.png" height="27px"/></a></li>
                        <li><a href="<?php echo getfield('google'); ?>" target="_blank"><img src="images/google.png" height="27px"/></a></li>
                        <li><a href="<?php echo getfield('flicker'); ?>" target="_blank"><img src="images/flickr.png" height="25px"/></a></li>
                    </ul>
            	</div>
                
                <?php 
		$user_id=$_SESSION['user_id'];
		if(isset($_POST['change_profile_pic'])){
			$name=$_FILES['choose_profile_pic']['name'];
			
			if(!empty($name)){
			
			$temp_name=$_FILES['choose_profile_pic']['tmp_name'];
			$location=$_SERVER['DOCUMENT_ROOT']."/2.MOD/images/propic/".$name;
			move_uploaded_file($temp_name,$location);
			$profilepic="images/propic/".$name;
			
			$query="UPDATE `users` SET `profilepic`='$profilepic' WHERE `id`='$user_id'";
			mysql_query($query);
			header('Location:home.php');
		}}
		?>
        
            <form action="home.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="choose_profile_pic" id="choose">
                <input type="submit" id="change" name="change_profile_pic" value="Update Profile Pic">
            </form>
         <img src="<?php echo getfield('profilepic'); ?>" id="propic" height="200px" border="1px" alt="file" />
        
                
                <div id="about">
                	<ul>
                    	<li >Update Personal Information<hr /><ul class="animated fadeIn">
                        		<div id="personal_info">
                                
                                <?php
			$user_id=$_SESSION['user_id'];
			if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['band'])&&isset($_POST['genere'])&&isset($_POST['dob'])&&isset($_POST['contact_no'])&&isset($_POST['address'])&&isset($_POST['about'])&&isset($_POST['email'])){
				$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];$band=$_POST['band'];$genere=$_POST['genere'];$dob=$_POST['dob'];$contact_no=$_POST['contact_no'];$address=$_POST['address'];$about=$_POST['about'];$email=$_POST['email'];
				if(!empty($firstname)&&!empty($lastname)){
					
						$query="UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`band`='$band', `genere` ='$genere',`dob`='$dob',`contact_no`='$contact_no',`address`='$address',`about`='$about',`email`='$email' WHERE `id`='$user_id'";
						if(mysql_query($query)){
							
							echo "<html><div class=\"warning animated bounce\" style=\"color:#55D076; 				margin-bottom:10px;\">Update Successfull</div>";
							
						}
					}
				else{
					echo "<html><div class=\"warning animated bounce\" style=\"color:#E12427;margin-bottom:10px;\">
					Please Fill In All Fields</div>";}} 
					
				
		
		?>
                                
                                <form action="home.php" method="POST">
                                <input type="text" placeholder="Firstname" name="firstname"><br /><input type="text" placeholder="Lastname" name="lastname"><br/><input type="date" placeholder="Birthday" name="dob"><br /><br />
                                <input type="text" placeholder="Contact No" maxlength="11" name="contact_no"><br /><input type="email" placeholder="Email" name="email"><br /><textarea placeholder="Address" name="address" ></textarea><br /><br />
                                <input type="text" placeholder="Genre Of Music Enjoyed" name="genere"><br /><input type="text" placeholder="Band Involved With" name="band">
   								 </div>
                                 <textarea id="about" placeholder="About" name="about"></textarea>
                                 <input type="submit" id="update_personal_info" value="Update Personal Info" />
                                 </form>
                     		</ul>
                        </li>
                        <li ><hr />Update Posts<hr /><ul class="posts animated fadeIn" style="margin:20px;">
                         <?php
								$query="SELECT * FROM `posts` WHERE `user_id`='$user_id' ORDER BY `id` DESC";
								$query_run=mysql_query($query);
								while($row=mysql_fetch_array($query_run)){
								$result[]=$row;	}
								foreach($result as $row){
										$id=$row['id'];
										echo "<li id='post'>";
										echo $row['post'];
										echo "</li>";
										echo "<img src='images/like.png' height='20px' name='like' alt='submit'><span style='position:relative;top:-55px;left:880px;color:#7C7878;font-size:16px'>".getfield2('like','posts')."</span>";
											}
                            ?>
                        </ul></li>
                        <li><hr />Update Photos</li><hr />
                        <li><hr />Update Audios</li><hr />
                        <li><hr />Update Videos<hr /><ul class="animated fadeIn">
                        <div id="video">
                        <div id="content">
                                <?php 
                                    $video_query="SELECT `url` FROM `videos` WHERE `user_id`='$user_id' ORDER BY `id` DESC";
                                    $video_query_run=mysql_query($video_query);
                                    if(mysql_num_rows($video_query_run)!=0){
                                    while($video_row=mysql_fetch_array($video_query_run)){
                                        $video_result[]=$video_row;	}
                                        foreach($video_result as $video_var){
                                            $video_url=$video_var['0'];
                                            echo "<iframe width='250' height='150' src='".$video_url."'frameborder 																		 													='0'> </iframe>";}}
											
                                ?></div>
                                <a href="add.php"><div id="add_video" style="display:inline-block;"><img  src="images/add.png" height="25" style="margin-bottom:-7px;margin-right:7px;"/>Add New Videos</div></a>
                            </div>
                        	</ul>
                        </li><hr />
                    </ul>
                 </div>
                
        </header>
	
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