* {
	paddin:0px;
	margin:0px;
	cursor:default;
	}
	
/************************		DISABLE BLUE BORDER INPUT FOCUS			**********************/
	
*:focus {
	outline:none;
	
}

a:link, a:visited, a:hover, a:active {
		text-decoration:none;
		color:inherit;
}

body {
	width:100%;
	display:-webkit-box;
	-webkit-box-pack:vertical;
	-webkit-box-flex:1;
	background:url(images/footer_lodyas.png);
	background-attachment:fixed;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}

#nav {
	position:fixed;
	top:0px;
	width:100%;
	height:50px;
	background:rgba(2,2,2,1);
	font-family:Tahoma;
	font-size:18px;
	color:white;
	padding-left:75px;
	}
#nav #seperator {
	border:2px solid #55D076;
	position:fixed;
	top:50px;
	left:0px;
	height:2px;
	width:100%;
	background:#55D076;
	-webkit-box-shadow:0px 2px 5px 2px rgba(85,83,83,0.7);
}
	
#nav li {
	display:inline-block;
	align-items:center;
	list-style:none;
	padding:10px;
}

#nav li img {
	padding-right:5px;
}

#nav li:hover {
	background:#55D076;
}

#wrapper {
	position:absolute;
	top:130px;
	width:70%;
	padding:30px;
	margin-left:50px;
	margin-bottom:50px;
	background:rgba(2,2,2,0.1);
	padding:20px;
	border-radius:10px;
}

#wrapper #change_username {
	background-color:rgba(2,2,2,0.2);
	border-radius:5px;
	width:420px;
	padding:10px;
	padding-left:20px;
	align-items:center;
	margin:20px;
}

#wrapper #change_email {
	background-color:rgba(2,2,2,0.2);
	border-radius:5px;
	position:absolute;
	top:20px;
	left:500px;
	width:420px;
	padding:10px;
	padding-left:20px;
	align-items:center;
	margin:20px;
}

#wrapper #change_password {
	background-color:rgba(2,2,2,0.2);
	border-radius:5px;
	position:relative;
	top:20px;
	width:420px;
	padding:10px;
	padding-left:20px;
	align-items:center;
	margin:20px;
}

#wrapper #social {
	background-color:rgba(2,2,2,0.2);
	border-radius:5px;
	position:relative;
	top:20px;
	width:420px;
	padding:10px;
	padding-left:20px;
	align-items:center;
	margin:20px;
}

#wrapper #social input {
	width:350px;
}

#wrapper #social #button {
	position:relative;
	left:250px;
}


#wrapper #change_password input{
	padding:5px;
	margin-top:15px;
	width:300px;
	border-radius:3px;
	-webkit-box-shadow:0px 1px 2px 0px #A09E9E inset;
	color:#8C898A;
	font-family:tahoma;
	font-size:18px;
	
}

#wrapper input{
	padding:5px;
	margin-top:15px;
	width:250px;
	border-radius:3px;
	-webkit-box-shadow:0px 1px 2px 0px #A09E9E inset;
	color:#8C898A;
	font-family:tahoma;
	font-size:18px;
	cursor:text;
}

#wrapper #change_password #button {
	position:relative;
	padding:10px;
	background:#55D076;
	color:white;
	font-family:tahoma;
	margin-left:15px;
	margin-bottom:15px;
	font-size:18px;
	border-radius:3px;
	border:1px solid #4CB367;
	-webkit-transition:-webkit-transform 1s;
	left:100px;
	width:200px;
	cursor:default;
}

#wrapper #button, #wrapper #social #button {
	padding:10px;
	background:#55D076;
	color:white;
	font-family:tahoma;
	margin-left:15px;
	margin-bottom:15px;
	font-size:18px;
	width:100px;
	border-radius:3px;
	border:1px solid #4CB367;
	-webkit-transition:-webkit-transform 1s;
	cursor:default;
}

#wrapper #button:hover, #wrapper #change_password #button:hover {
	background-color:#4CB367;
}

	