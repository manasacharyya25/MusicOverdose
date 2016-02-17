<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'mod';
	
	if(!mysql_connect($host,$user,$password) || !mysql_select_db($db)){
		die(mysql_error());
	}
?>