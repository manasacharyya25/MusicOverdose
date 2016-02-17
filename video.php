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
							<form action="home.php" method="POST">
                                <input type="text" placeholder="Enter Video Code" required name="code" ><br /><input type="text" name="name" placeholder="Name Of The Video" required><br /><input type="text" height="auto"  placeholder="About The Video" name="about" ><br /><input type="text" height="auto" placeholder="Lyrics" name="lyrics" ><br />
                                <input type="submit" name="submit">
                            </form>
                            
                        