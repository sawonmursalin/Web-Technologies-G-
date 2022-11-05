<?php
session_start();
if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
	if(!isset($_SESSION['user'])){
		$_SESSION['user'] = json_decode(base64_decode($_COOKIE['user']), true);
	}
	header('Location: view_profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" type="text/css" href="top.css">
</head>
<body>
	<fieldset>
		<div class="header">
			<div class="logo"><img src="./use_img/logo.png" height="150px" width="200px"></div>
			<div class="navigation">
				<div class="home"><a href="welcome.php">Home<span> |</span></a></div>
				<div class="login"><a href="login.php">Log in<span> |</span></a></div>
				<div class="registration"><a href="registration.php">Registration</a></div>
			</div>
		</div>
	</fieldset>
</body>
</html>