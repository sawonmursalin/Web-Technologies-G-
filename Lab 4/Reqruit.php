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
								<hr> <br>
								<ul>
								<li><a href="view_profile.php">View Profile</a></li>
								<li><a href="edit_profile.php">Edit Profile</a></li>
								<li><a href="change_pp.php">Change Profile Picture</a></li>
								<li><a href="change_pass.php">Change Password</a></li>
								<li><a href="Reqruit.php">Reqruit</a></li>
								<li><a href="addEdit.php">Edit Details</a></li>
								<li><a href="reqruiter_details.php">Requiter Details</a></li>


								<form method="POST" action="logout.php">
							<li><button type="submit" name="logout_btn">Log out</button></li>
						</form>
								</ul>
							</td>
							<td>
							<fieldset>
							<legend><h2>Appicant List</h2></legend>
                         <?php
						 if(filesize("appenddetails.json ")<=0){
							 echo"No users Available";
							 }
							 else{
								 $f = fopen("appenddetails.json", 'r');
								 $s = fread($f, filesize("appenddetails.json"));
								 $data = json_decode($s);
								 echo "<table>";
	                             echo "<tr>";
	                             echo "<th>Applicant Name</th>";
	                             echo "<th>Age</th>";
	                             echo "<th>Gender</th>";
	                             echo "<th>Address</th>";
	                             echo "<th>Qualification</th>";
								 echo "</tr>";
	                    for ($x = 0; $x < count($data); $x++) {
							echo "<tr>";
  	                        echo "<td>" . $data[$x]->applicantname . "</td>";
	                        echo "<td>" . $data[$x]->age . "</td>";
	                        echo "<td>" . $data[$x]->gender . "</td>";
	                        echo "<td>" . $data[$x]->address . "</td>";
	                        echo "<td>" . $data[$x]->qualification . "</td>";
	                        
	                        echo "</tr>";
							}
							echo "</table>";
							fclose($f);
							}
							?>					
				
					</fieldset>
				</div>
			</form>
		</fieldset>
		</div>

	<?php include 'footer.php';?>
</body>
</html>