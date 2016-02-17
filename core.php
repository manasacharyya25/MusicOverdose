<?php
	ob_start();
	session_start();
	
	function getfield($field){
		$user_id=$_SESSION['user_id'];
		$getfield_query="SELECT `$field` FROM `users` WHERE `id`='$user_id'";
		if($getfield_query_run=mysql_query($getfield_query)){
			return mysql_result($getfield_query_run,0,`$field`);}}
			
	function getfield2($field,$table){
		$user_id=$_SESSION['user_id'];
		$getfield_query="SELECT `$field` FROM `$table` WHERE `id`='$user_id'";
		if($getfield_query_run=mysql_query($getfield_query)){
			return mysql_result($getfield_query_run,0,`$field`);}}
			
?>