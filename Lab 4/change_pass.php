<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<?php include 'log_top.php';?>

	<?php
	
	$curr_pass = $new_pass = $re_new_pass = "";
	$curr_pass_Err = $new_pass_Err = $re_new_pass_Err = $pass_mismatch_Err = $same_prev_pass_Err = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$errorFlag = false;

		if (!isset($_POST['curr_pass']) || empty($_POST['curr_pass'])) {
			$curr_pass_Err = "Field can not be empty";
			$errorFlag = true;
		}
		else{
			$curr_pass = $_POST['curr_pass'];	
		}

		if (!isset($_POST['new_pass']) || empty($_POST['new_pass'])) {
			$new_pass_Err = "Field can not be empty";
			$errorFlag = true;
		}
		else{
			$new_pass = $_POST['new_pass'];
		}
	
		if (!isset($_POST['re_new_pass']) || empty($_POST['re_new_pass'])) {
			$re_new_pass_Err = "Field can not be empty";
			$errorFlag = true;
		}
		else{
			$re_new_pass = $_POST['re_new_pass'];
		}
		if (!$errorFlag) {
			$users = json_decode(file_get_contents('users.json'),true);

			foreach ($users as $key => $value) {
				if ($value['username'] ==  $_SESSION['user']['username']){

					$set = [
						'name' => $_SESSION['user']['name'],
						'email' => $_SESSION['user']['email'],
						'username' => $_SESSION['user']['username'],
						'password' => $new_pass,
						'gender' => $_SESSION['user']['gender'],
						'dob' => $_SESSION['user']['dob'],
						'profilePicPath' => $_SESSION['user']['profilePicPath']
					];
					$_SESSION['user'] = $set;
					if(isset($_COOKIE['user'])){
						setrawcookie('user', base64_encode(json_encode($_SESSION['user'])));
					}
					$users[$key] = $_SESSION['user'];
					file_put_contents('users.json', json_encode($users));

					header('Location: view_profile.php');
					break;
				}
			}
		}
	}
	?>

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
								
								<li><a href="requiter_details.php">Reqruiter Details</a></li>
								

						<form method="POST" action="logout.php">
							<li><button type="submit" name="logout_btn">Log out</button></li>
						</form>
						
					</ul>
				</td>
				<td width="75%">
					<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
						<fieldset>
							<legend>CHANGE PASSWORD</legend>
							<table>
								<tr>
									<td>Current Password</td>
									<td>:</td>
									<td><input type="text" name="curr_pass" value="<?php echo $curr_pass; ?>"></td>
									<td><span class="red"><?php echo $curr_pass_Err; ?></span></td>
									<td></td>
								</tr>

								<tr>
									<td>New Password</td>
									<td>:</td>
									<td><input type="text" name="new_pass" value="<?php echo $new_pass; ?>"></td>
									<td><span class="red"><?php echo $new_pass_Err; ?></span></td>
									<td><?php echo $same_prev_pass_Err; ?></td>

								</tr>

								<tr>
									<td>Confirm Password</td>
									<td>:</td>
									<td><input type="text" name="re_new_pass" value="<?php echo $re_new_pass; ?>"></td>
									<td><span class="red"><?php echo $re_new_pass_Err; ?></span></td>
									<td><span class="red"><?php echo $pass_mismatch_Err; ?></span></td>
								</tr>
							</table>
							<br>
							<hr>
							<input type="submit" name="submit">
						</fieldset>
					</form>

					<?php include 'footer.php';?>
				</body>
				</html>