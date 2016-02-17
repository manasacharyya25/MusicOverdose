<?php 
	require 'core.php';
	require 'dbcon.php';
	require 'session.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="css_profile.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css" />
<link rel="stylesheet" type="text/css" href="css/hover.css" />
</head>

<body>
       
    <header id="header">
        	
        	<!--****************************	OPEN A LINK IN NEW TAB (target="_blank")	*******************!-->
            
            
            	<img src="<?php echo getfield('profilepic'); ?>" id="propic" height="200px" border="1px" alt="file" />
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
                <div id="about">
                	<ul>
                    	<li >Personal Information<hr /><ul class="animated fadeIn">
                        		<div id="personal_info">
                                <input type="text" value="<?php echo "Name : ".getfield('firstname')." ".getfield('lastname'); ?>" disabled><br /><input type="text" value="<?php echo "Birthday : ".getfield('dob') ?>" disabled><br /><br />
                                <input type="text" value="<?php echo "Contact Number : ".getfield('contact_no') ?>" disabled><br /><input type="text" value="<?php echo "Email : ".getfield('email') ?>" disabled><br /><textarea value="<?php echo "Address : ".getfield('address') ?>" disabled ></textarea><br /><br />
                                <input type="text" value="<?php echo "Enjoys Music From ".getfield('genere')." Genere" ?>" disabled><br /><input type="text" value="<?php echo "Band Involved With : ".getfield('band') ?>" disabled>
   								 </div>
                                 <textarea id="about" placeholder="<?php echo getfield('about') ?>" disabled></textarea>
                     		</ul>
                        </li><hr />
                        <li>Posts<hr /><ul class="posts animated fadeIn" style="margin:20px;">
                        	<?php
								$user_id=$_SESSION['user_id'];
								$query="SELECT * FROM `posts` WHERE `user_id`='$user_id' ORDER BY `id` DESC ";
								$query_run=mysql_query($query);
								while($row=mysql_fetch_array($query_run)){
								$result[]=$row;	}
								foreach($result as $row){
										$post_id=$row['id'];
										echo "<li id='post'>";
										echo $row['post'];
										echo "</li>";
										echo "<form action='home.php' method='POST'><input type='image' src='images/like.png' height='25px' name='like' alt='submit'></form><span style='position:relative;top:-80px;left:930px;color:#4BB86C;font-size:14px'>".getfield2('like','posts')."</span>";
											}
                            ?>
                        </ul></li><hr />
                        <li>Photos<hr /></li><hr />
                        <li>Audio<hr /></li><hr />
                        <li>Video<hr /><ul class="animated fadeIn">
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
											
                                ?></div></div>
                        </ul></li>
                    <hr />
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