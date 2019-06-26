
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000; font-size:12px; padding-left:5px;}
</style>
</head>
<body>  

<?php

// define variables and set to empty values
$nameErr = $emailErr = $incomeErr = $educationErr = $locationErr= $professionErr= $heightErr= $dobErr= $passwordErr= $religionErr=$confirm_passErr =$heightErr =$genderErr="";
$name = $email = $income = $education = $location= $profession = $year= $month= $date= $religion= $password=$confirm_password= $gender= "";
$feet= $inch=0;
$counter=0;
$update_counter=0;

if (isset($_POST['submit'])) { 
  if (empty($_POST["Name"])) {
    $nameErr = "Required";
  } else {
	  $name = test_input($_POST["Name"]);
   
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
	else{$counter++;
	$update_counter++;}
  }
  
  if (empty($_POST["Email"])) {
    $emailErr = "Required";
  } else {
    $email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
	else{$counter++;
	$update_counter++;}
  }
  
  if (empty($_POST["Password"])) {
    $passwordErr = "Required";
  } else{
  $password=$_POST["Password"];
  if(strlen($password) < 8){
  $passwordErr = "Password must be at least 8 characters";}
  else{$counter++;}
  }
  
  if (empty($_POST["Confirm_pass"])) {
    $confirm_passErr = "Confirm the password";
  } else{
  $confirm_password=$_POST["Confirm_pass"];
  if (strcmp($password,$confirm_password) !=0){
  $confirm_passErr = "Password doesn't match!";}
  else{$counter++;}
  }
  
  if (empty($_POST["Religion"])) {
    $religionErr = "Religion is Required";
  } else {
    $religion = test_input($_POST["Religion"]);
    $counter++;}

	
	if (empty($_POST["Date"])) {
    $dobErr = "All field is required";
  } else {
    $date = test_input($_POST["Date"]);
    $counter++;}
	
	if (empty($_POST["Month"])) {
    $dobErr = "All field is required";
  } else {
    $month = test_input($_POST["Month"]);
    $counter++;}
	
	if (empty($_POST["Year"])) {
    $dobErr = "All field is required";
  } else {
    $year = test_input($_POST["Year"]);
    $counter++;}
	
	if (empty($_POST["Inch"])) {
    $heightErr = "All field is required";
  } else {
    $inch = test_input($_POST["Inch"]);
    $counter++;}
	
	if (empty($_POST["Feet"])) {
    $heightErr = "All field is required";
  } else {
    $feet = test_input($_POST["Feet"]);
    $counter++;}
	
	
	
	if (empty($_POST["gender"])) {
    $genderErr = "Required";
  } else {
    $gender = test_input($_POST["gender"]);
	$counter++;
  }
  
  
	
	$dob = $year.'-'.$month.'-'.$date;

	 //condition for insert data
	if($counter==11){
		$height=$feet*12+$inch;
		$encripted_password= md5($password);
		
		$sql="SELECT * FROM person_details where Email='$email'";
		$result = mysqli_query($db, $sql);
		
		$row = mysqli_num_rows($result);
		if($row==0){
		echo " not exist";
		$sql = "INSERT INTO person_details (`Name`, `dob`, `Height`, `Religion`, `Location`, `Education`, `Profession`, `Income`, `Email`, `Password`, `gender`) VALUES ('$name','$dob','$height','$religion','$location','$education','$profession','$income','$email','$encripted_password','$gender')";
		
		
		if ($db->query($sql) === TRUE) {
			header('Location: index.php');
				$db_connect_msg= "Record updated successfully";
			} else {
				$db_error_msg= "Error: " . $sql . "<br>" . $db->error;
			}
		}
		
		else{$db_error_msg="Already have an Account!!";}
	}
 

}
function test_input($data) {
  $data = trim($data);
  //$data = stripslashes($data);
//  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>
