
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000; font-size:12px; padding-left:5px; font-weight:normal; height:15px;}
</style>
</head>
<body>  

<?php
$db = mysqli_connect("localhost", "root", "", "project");

// define variables and set to empty values
$emailErr=$passwordErr=$log_error_msg="";
$email = $password="";
 $db_email= "";
$counter=0;

if (isset($_POST['login'])) { 
  
  if (empty($_POST["Email"])) {
    $emailErr = "Required";
  } 
	else{
		$email = test_input($_POST["Email"]);$counter++;}
 
  
  if (empty($_POST["Password"])) {
    $passwordErr = "Required";
  }
  else{
	  $password = test_input($_POST["Password"]);$counter++;}
	
	//condition for update data from profile page
	if($counter == 2){
		
		$encripted_password= md5($password);
		
		$sql="SELECT * FROM person_details where Email='$email' and Password = '$encripted_password'";
		$result = mysqli_query($db, $sql);
		
			
		$row = mysqli_fetch_assoc($result);
		if(!empty($row["Password"])){
			$_SESSION['login_user']=$email; // Initializing Session
			$_SESSION['valid']="True"; // Initializing Session
				header("location: main.php"); // Redirecting To Other Page
				} else {
				$log_error_msg = "Username or Password is invalid";
				}
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
