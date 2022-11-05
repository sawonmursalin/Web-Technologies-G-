<?php 
// Start session 
session_start(); 
 
// Include and initialize DB class 
require_once 'Json.class.php'; 
$db = new Json(); 
 
// Set default redirect url 
$redirectURL = 'reqruiter_details.php'; 
 
if(isset($_POST['userSubmit'])){ 
    // Get form fields value 
    $id = $_POST['id']; 
    $applicantname = trim(strip_tags($_POST['applicantname'])); 
    $age = trim(strip_tags($_POST['age'])); 
    $gender = trim(strip_tags($_POST['gender'])); 
    $address = trim(strip_tags($_POST['address'])); 
    $qualification = trim(strip_tags($_POST['qualification']));
    $id_str = ''; 
    if(!empty($id)){ 
        $id_str = '?id='.$id; 
    } 
     
    // Fields validation 
    $errorMsg = ''; 
    if(empty($applicantname)){ 
        $errorMsg .= '<p>Please enter Applicant Name.</p>'; 
    } 
    if(empty($age)){ 
        $errorMsg .= '<p>Please enter age.</p>'; 
    } 
    if(empty($gender)){ 
        $errorMsg .= '<p>Please enter gender .</p>'; 
    } 
    if(empty($address)){ 
        $errorMsg .= '<p>Please enter address .</p>'; 
    } 
    if(empty($qualification)){ 
        $errorMsg .= '<p>Please enter qualification.</p>'; 
    } 

    // Submitted form data 
    $userData = array( 
        'applicantname' => $applicantname, 
        'age' => $age, 
        'gender' => $gender, 
        'address' => $address,
        'qualification' => $qualification 
    ); 
     
    // Store the submitted field value in the session 
    $sessData['userData'] = $userData; 
     
    // Submit the form data 
    if(empty($errorMsg)){ 
        if(!empty($_POST['id'])){ 
            // Update user data 
            $update = $db->update($userData, $_POST['id']); 
             
            if($update){ 
                $sessData['status']['type'] = 'success'; 
                $sessData['status']['msg'] = 'Applicant data has been updated successfully.'; 
                 
                // Remove submitted fields value from session 
                unset($sessData['userData']); 
            }else{ 
                $sessData['status']['type'] = 'error'; 
                $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                 
                // Set redirect url 
                $redirectURL = 'addEdit.php'.$id_str; 
            } 
        }else{ 
            // Insert user data 
            $insert = $db->insert($userData); 
             
            if($insert){ 
                $sessData['status']['type'] = 'success'; 
                $sessData['status']['msg'] = 'Applicant data has been added successfully.'; 
                 
                // Remove submitted fields value from session 
                unset($sessData['userData']); 
            }else{ 
                $sessData['status']['type'] = 'error'; 
                $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                 
                // Set redirect url 
                $redirectURL = 'addEdit.php'.$id_str; 
            } 
        } 
    }else{ 
        $sessData['status']['type'] = 'error'; 
        $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>'.$errorMsg; 
         
        // Set redirect url 
        $redirectURL = 'addEdit.php'.$id_str; 
    } 
     
    // Store status into the session 
    $_SESSION['sessData'] = $sessData; 
}elseif(($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])){ 
    // Delete data 
    $delete = $db->delete($_GET['id']); 
     
    if($delete){ 
        $sessData['status']['type'] = 'success'; 
        $sessData['status']['msg'] = 'Applicant data has been deleted successfully.'; 
    }else{ 
        $sessData['status']['type'] = 'error'; 
        $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
    } 
     
    // Store status into the session 
    $_SESSION['sessData'] = $sessData; 
} 
 
// Redirect to the respective page 
header("Location:".$redirectURL); 
exit(); 
?>