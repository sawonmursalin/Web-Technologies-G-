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
					<?php 
 
 
// Retrieve session data 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get member data 
$memberData = $userData = array(); 
if(!empty($_GET['id'])){ 
    // Include and initialize JSON class 
    include 'Json.class.php'; 
    $db = new Json(); 
     
    // Fetch the member data 
    $memberData = $db->getSingle($_GET['id']); 
} 
$userData = !empty($sessData['userData'])?$sessData['userData']:$memberData; 
unset($_SESSION['sessData']['userData']); 
 
$actionLabel = !empty($_GET['id'])?'Edit':'Add'; 
 
// Get status message from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>

<!-- Display status message -->
<?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
<div class="col-xs-12">
    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
</div>
<?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
<div class="col-xs-12">
    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <h2><?php echo $actionLabel; ?> details</h2>
    </div>
    <div class="col-md-6">
         <form method="post" action="userAction.php">
            <div class="form-group">
                <label>applicantname</label>
                <input type="text" class="form-control" name="applicantname" placeholder="Enter applicant name" value="<?php echo !empty($userData['applicantname'])?$userData['applicantname']:''; ?>" required="">
            </div>
            <div class="form-group">
                <label>age</label>
                <input type="text" class="form-control" name="age" placeholder="Enter age" value="<?php echo !empty($userData['age'])?$userData['age']:''; ?>" required="">
            </div>
            <div class="form-group">
                <label>gender</label>
                <input type="text" class="form-control" name="gender" placeholder="Enter gender " value="<?php echo !empty($userData['gender'])?$userData['gender']:''; ?>" required="">
            </div>
            <div class="form-group">
                <label>address </label>
                <input type="text" class="form-control" name="address" placeholder="Enter address " value="<?php echo !empty($userData['address'])?$userData['address']:''; ?>" required="">
            </div>
            <div class="form-group">
                <label>qualification </label>
                <input type="text" class="form-control" name="qualification" placeholder="Enter qualification" value="<?php echo !empty($userData['qualification'])?$userData['qualification']:''; ?>" required="">
            </div>
            
            <a href="reqruit.php" class="btn btn-secondary">Back</a>
            <input type="hidden" name="id" value="<?php echo !empty($memberData['id'])?$memberData['id']:''; ?>">
            <input type="submit" name="userSubmit" class="btn btn-success" value="Submit">
        </form>
    </div>
</div>



						</fieldset>
					</td>
				</tr>
			</table>
		</fieldset>

		<?php include 'footer.php';?>
	</body>
	</html>