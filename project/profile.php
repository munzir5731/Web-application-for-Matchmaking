<!DOCTYPE html>

<?php
	include "header_profile.php";
	include "session.php";
	
?>

<?php

// Create database connection
  $db = mysqli_connect("localhost", "root", "", "project");
  $result = mysqli_query($db, "SELECT * FROM person_details where Email='$user_check'");
  
  
  // Initialize message variable
  $success_msg = $error_msg= $db_connect_msg= $db_error_msg= "";

  // If upload button is clicked ...
  
if (isset($_POST["upload"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["image"]["tmp_name"])) {
  
            $error_msg= "Choose image file to upload.";
        
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
     
            $error_msg= "Only PNG and JPEG are allowed.";
        
    }    // Validate image file size
    else if (($_FILES["image"]["size"] > 2000000)) {
        $error_msg="Image size exceeds 2MB";
    }    
	else {
		$image = $_FILES['image']['name'];
		$sql = "update person_details SET photo ='$image' where Email='$user_check'";
  	// execute query
  	mysqli_query($db, $sql);
        $target = "images/" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
          
                $success_msg= "Image uploaded successfully.";
				header("location: profile.php");
    
        } else {
            $error_msg="Problem in uploading image";
        }
    }
}

?>

	


	
	<body>
	
	<div class="container-fluid text-center"> 
	    
	
	  <div class="details_container">
		<div class="details_area"> 
		
		<?php
		
		include "update_validation.php";
		
		$row = mysqli_fetch_assoc($result);
		$time = strtotime($row["dob"]);
		
		$height_total=$row["Height"];
		$height_feet=intdiv($height_total, 12);
		$height_inch=$height_total%12;
		
			
		?>
			
			<div id="details_image">
				<img src="images/<?php echo $row["photo"];?>" style="width:auto; height:100%; max-width:100%;">
			</div>
			
		<form id="image" method="POST" action="profile.php" enctype="multipart/form-data">
			<div id="change_image_div">
				<input type="hidden" name="size" value="1000000">
				<div>
				 <input type="file" name="image">
				 <button type="submit" name="upload">Update</button>
				</div>
				
				<div style="padding-top:10px;"><span style="color:#00b33c"><?php echo $success_msg; ?></span><span style="color:#FF0000"><?php echo $error_msg; ?></span></div>
				
			</div>	
		</form>
			
			<div id="details_text_container">
				<div id ="details_text">
				
				<form id="details" method="post" action="profile.php">  
				
					<h4 class="line-details">
						<span class="field-title">Name</span>
						<span class="field-separator"> : </span>
						<span class="field-value"> <input type="text" name="Name" value="<?php echo $row["Name"]; ?>"></span>
						<span class="error"><?php echo $nameErr;?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Date of birth </span>
						<span class="field-separator">: </span>
						<span class="field-value"><select name="Year">
													<option value=<?php echo date('Y', $time);?> selected><?php echo date('Y', $time);?></option>
													<?php
														for($i=date('Y'); $i>1969; $i--) {
															$birthdayYear = '';
															$selected = '';
															if ($birthdayYear == $i) $selected = ' selected="selected"';
															print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
														}
													?>      
													</select>
													</span>
						<span class="field-value"><select name="Month">
													<option value="<?php echo date('m', $time);?>" selected><?php echo date('m', $time);?></option>
													<?php
														for($i=1; $i<=12; $i++) {
															$birthdayMonth = '';
															$selected = '';
															if ($birthdayMonth == $i) $selected = ' selected="selected"';
															print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
														}
													?> 
													</select>
													</span>
						<span class="field-value"><select name="Date">
													<option value="<?php echo date('d', $time);?>" selected><?php echo date('d', $time);?></option>
													<?php
														for($i=1; $i<=31; $i++) {
															$birthdayDate = '';
															$selected = '';
															if ($birthdayDate == $i) $selected = ' selected="selected"';
															print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
														}
													?> 
													</select>
													</span>
												
					</h4>
					
					<h4 class="line-details">
						<span class="field-title">Height </span>
						<span class="field-separator">: </span>
						<span class="field-value"> <select name="Feet">
													<option value="<?php echo $height_feet;?>" selected><?php echo "$height_feet'";?></option>
													<option value="04">4'</option>
													<option value="05">5'</option>
													<option value="06">6'</option>
													<option value="07">7'</option>
													<option value="08">8'</option>
													</select>
													</span>
						<span class="field-value"> <select name="Inch">
													<option value="<?php echo $height_inch;?>" selected><?php echo "$height_inch\"";?></option>
													<option value="01">1"</option>
													<option value="02">2"</option>
													<option value="03">3"</option>
													<option value="04">4"</option>
													<option value="05">5"</option>
													<option value="06">6"</option>
													<option value="07">7"</option>
													<option value="08">8"</option>
													<option value="09">9"</option>
													<option value="10">10"</option>
													<option value="11">11"</option>
													</select>
													</span>
													
					</h4>
					
					<h4 class="line-details">
						<span class="field-title">Religion</span>
						<span class="field-separator">: </span>
						<span class="field-value"> <select name="Religion">
													<option value="<?php echo $row["Religion"];?>" selected><?php echo $row["Religion"];?></option>
													<option value="Islam">Islam</option>
													<option value="Hindu">Hindu</option>
													<option value="Buddh">Buddh</option>
													<option value="Christia">Christian</option>
													</select>
													</span>
							
					</h4>
					<h4 class="line-details">
						<span class="field-title">Location</span>
						<span class="field-separator">: </span>
						<span class="field-value"><input type="text" name="Location" value="<?php echo $row["Location"]; ?>"></span>
						<span class="error"><?php echo $locationErr;?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Education</span>
						<span class="field-separator">: </span>
						<span class="field-value"><input type="text" name="Education" value="<?php echo $row["Education"]; ?>"></span>
						<span class="error"><?php echo $educationErr;?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Profession</span>
						<span class="field-separator">: </span>
						<span class="field-value"><input type="text" name="Profession" value="<?php echo $row["Profession"]; ?>"></span>
						<span class="error"><?php echo $professionErr;?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Income (monthly)</span>
						<span class="field-separator">: </span>
						<span class="field-value"><input type="text" name="Income" value="<?php echo $row["Income"]; ?>"></span>
						<span class="error"><?php echo $incomeErr;?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Email</span>
						<span class="field-separator">: </span>
						<span class="field-value"><input type="text" name="Email" value="<?php echo $row["Email"]; ?>"></span>
						<span class="error"><?php echo $emailErr;?></span>
					</h4>
					
					<input type="submit" name="update" value="Update">
					
					<div style="padding-top:10px; font-size: 18px;"><span style="color:#00b33c"><?php echo $db_connect_msg; ?></span><span style="color:#FF0000"><?php echo $db_error_msg; ?></span></div>

					
				</form>
				</div>
			</div>

		  
		  
		</div>
		
	  </div>
	  </div>

	<footer class="container-fluid text-center">
	  © Copyright 2018. All rights reserved by bibah.com
	</footer>
	
	<script>
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
				document.getElementById("topBtn").style.display = "block";
			} else {
				document.getElementById("topBtn").style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
</script>

	</body>
	

