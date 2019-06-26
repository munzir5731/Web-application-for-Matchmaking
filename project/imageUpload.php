<?php

// Create database connection
  $db = mysqli_connect("localhost", "root", "", "project");
  $result = mysqli_query($db, "SELECT * FROM person_details");
  
  
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	//$sql = "INSERT INTO person_details (photo, id) VALUES ('$image', '$image_text')";
	$sql= "UPDATE `person_details` SET photo = '$image'";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully!!!";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  

?>


<form id="image" method="POST" action="imageUpload.php" enctype="multipart/form-data">
			<div id="change_image_div">
				<input type="hidden" name="size" value="1000000">
				<div>
				 <input type="file" name="image">
				 <button type="submit" name="upload">Update</button>
				</div>
				
				<div style="padding-top:10px; color:#00b33c"><?php echo $msg; ?></div>
				
			</div>	
</form>