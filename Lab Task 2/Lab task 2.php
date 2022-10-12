<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $dobErr=$degreeErr = $bgErr ="";
$name = $email = $gender = $dob = $degree = $bg= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {            
    $nameErr = "Name is required";
  } 
  else{
     $name = $_POST["name"];
     if (preg_match("/^[a-zA-Z-' ]*$ _/",$name)) {
      $name = $_POST["name"];
      }
     else{
     $nameErr = "Can contain a-z,A-Z,period,dash only";
     }
       $name = $_POST["name"]; 
       if(str_word_count($name)<2){
      $nameErr= "At least contains 2 words";
     }
     else{
      $name = $_POST["name"]; 
     }  
      
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["dob"])) {
    $dobErr = "DOB is required";
  } else {
    $dob = $_POST["dob"];
  }
  if (empty($_POST["gender"])) {
    $genderErr = "At least one of them must be selected";
  } else {
    $gender = $_POST["gender"];
  }
    
  

  if (empty($_POST["degree"])) {
    $degreeErr = "At least two of them must be selected";
  } 
  else {
    $degree = $_POST["degree"];
   
  }
  
    if (empty($_POST["bg"])) {
      $bgErr = "Must be selected";
    } else {
      $bg = $_POST["bg"];
      echo $bg;
    }
  
 
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* 
    <?php 
    if ($nameErr){
    echo $nameErr;
    }
    ?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* 
    <?php 
    if($emailErr)
    echo $emailErr;
    ?></span>
  <br><br>
  Date of Birth: <input type="date" name="dob">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* 
              <?php 
              if($genderErr)
              echo $genderErr;
              ?></span>
  <br><br>
  
  Degree:
            <input type="checkbox" name="degree"  value="ssc">SSC 
            <input type="checkbox" name="degree"  value="hsc">HSC 
            <input type="checkbox" name="degree"  value="bsc">BSc 
            <input type="checkbox" name="degree"  value="msc">MSc 
            <span class="error">* 
              <?php 
              if($degreeErr)
              echo $degreeErr;
              ?></span>
  <br><br>
  Blood Group:
          
          <select>
            <option value="none">Select</option> 
            <option value="apos">A(+)ve</option> 
            <option value="aneg">A(-)ve</option> 
            <option value="bpos">B(+)ve</option> 
            <option value="bneg">B(-)ve</option> 
            <option value="opos">O(+)ve</option> 
            <option value="oneg">O(-)ve</option> 
            <option value="abpos">AB(+)ve</option>
            <option value="abneg">AB(-)ve</option> 
            
            
          </select>
           <span class="error">* 
           <?php 
              if($bgErr)
              echo $bgErr;
              ?></span>
           
         
       
       
    <br> <br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $bg;
?>

</body>
</html>