<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include 'log_top.php';?>

	<fieldset>
		<table border="1" width="100%">
			<tr>
				<td width="25%">
					Account<hr><br>
					<ul style="list-style-type:disc;">
					<li><a href="welcome.php">Dashboard</a></li>
					<li><a href="view_profile.php">View Profile</a></li>
								<li><a href="edit_profile.php">Edit Profile</a></li>
								<li><a href="change_pp.php">Change Profile Picture</a></li>
								<li><a href="change_pass.php">Change Password</a></li>
								<li><a href="Reqruit.php">Reqruit</a></li>
								<li><a href="addEdit.php">Edit Details</a></li>
								<li><a href="reqruiter_details.php">Reqruiter Details</a></li>

						<form method="POST" action="logout.php">
							<li><button type="submit" name="logout_btn">Log out</button></li>
						</form>
						
					</ul>
				</td>
				<td width="75%">
					<fieldset>
						<legend>PROFILE</legend>
						<table width="100%">
							<tr>
								<td width="25%">Name</td>
								<td><span>:</span><?= $_SESSION['user']['name']?></td>
								<td rowspan="3" width="100%" align="center"><img src="<?= $_SESSION['user']['profilePicPath'] ?>" height="200" width="200"></td>
							</tr>

							<tr>
								<td width="25%">Email</td>
								<td><span>:</span><?= $_SESSION['user']['email']?></td>
							</tr>

							<tr>
								<td width="25%">Gender</td>
								<td><span>:</span><?= $_SESSION['user']['gender']?></td>
							</tr>

							<tr>
								<td width="25%">Date of Birth</td>
								<td><span>:</span><?= $_SESSION['user']['dob']?></td>
								<td align="center" width="100%"><a href="change_pp.php">Change</a></td>
							</tr>
						</table><hr>
						<a href="edit_profile.php">Edit Profile</a>
					</fieldset>
				</td>
			</tr>
		</table>
	</fieldset>

	<?php include 'footer.php';?>
</body>
</html>