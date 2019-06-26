<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Sign Up</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="signup.css">
	  
	</head>

<?php

		$db_connect_msg= $db_error_msg= "";
		$db = mysqli_connect("localhost", "root", "", "project");
		
		include "formValidation.php";
		
		
	
?>


	


	
	
	<body Style="margin:0px;padding:0px;font-family:sans-serif;">
	<div class="sign_up_body">
		<div id="signup_header"><h3 id="head_text"><a style="text-decoration:none; color:#ff3333;" href="main.php">Bibah.com</a></h3></div>
		<div class="sign-up-form-div">
			<form method="post" action="registration.php">  
					<h4 class="line-details">
						<span class="field-value"> <input type="text" name="Name" placeholder="Enter your name" value="<?php echo $name ?>"></span>
						<span class="error"> * <?php echo $nameErr;?></span>
					</h4>
					
					<h4 class="line-details">
						<span class="field-value"><input type="text" name="Email" placeholder="Enter your Email" value="<?php echo $email ?>"></span>
						<span class="error"> * <?php echo $emailErr;?></span>
					</h4>
					
					<h4 class="line-details">Date of birth</h4>
					
					<h4 class="line-details-dob">
						<span class="field-value"><select name="Year">
													<option value="" selected>Year</option>
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
													<option value="" selected>Month</option>
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
													<option value="" selected>Day</option>
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
													<span class="error"> * <?php echo $dobErr;?></span>
												
					</h4>
					
					<h4 class="line-details">
						Height
						<span class="field-value-feet"> <select name="Feet">
													<option value="" selected>Feet</option>
													<option value="04">4'</option>
													<option value="05">5'</option>
													<option value="06">6'</option>
													<option value="07">7'</option>
													<option value="08">8'</option>
													</select>
													</span>
						<span class="field-value-inch"> <select name="Inch">
													<option value="" selected>Inch</option>
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
													<span class="error"> * <?php echo $heightErr;?></span>
													
					</h4>
					
					<h4 class="line-details">
						Religion
						<span class="field-value"> <select name="Religion">
													<option value="" selected>Religion</option>
													<option value="Islam">Islam</option>
													<option value="Hindu">Hindu</option>
													<option value="Buddh">Buddh</option>
													<option value="Christian">Christian</option>
													</select>
													</span>
													<span class="error"> * <?php echo $religionErr;?></span>
							
					</h4>
						<h4 class="line-details">
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
					<span class="error">* <?php echo $genderErr;?></span>  </h4>
					
					<h4 class="line-details">
						<span class="field-value"><input type="password" name="Password" placeholder="Password" value="<?php echo $password ?>"></span>
						<span class="error"> * <?php echo $passwordErr;?></span>
					</h4>
					
					<h4 class="line-details">
						<span class="field-value"><input type="password" name="Confirm_pass" placeholder="Confirm Password" value="<?php echo $confirm_password ?>"></span>
						<span class="error"> * <?php echo $confirm_passErr;?></span>
					</h4>
					
					<h4 class="line-details">
						<span class="field-value"><input type="text" name="Location" placeholder="Enter your Location" value="<?php echo $location ?>"></span>
						
					</h4>
					<h4 class="line-details">
						<span class="field-value"><input type="text" name="Education" placeholder="Enter your Education details" value="<?php echo $education ?>"></span>
						
					</h4>
					<h4 class="line-details">
						<span class="field-value"><input type="text" name="Profession" placeholder="Enter your Profession" value="<?php echo $profession ?>"></span>
					</h4>
					<h4 class="line-details">
						<span class="field-value"><input type="text" name="Income" placeholder="Income (monthly) Tk" value="<?php echo $income ?>"></span>
					</h4>
					
					<input type="submit" name="submit" value="Sign UP">
					
					<div style="padding-top:10px; font-size: 18px;"><span style="color:#00b33c"><?php echo $db_connect_msg; ?></span><span style="color:#FF0000"><?php echo $db_error_msg; ?></span></div>
					
				</form>
		
		
		</div>
		</div>
	
	
	</body>
	

	<footer>© Copyright 2018. All rights reserved by bibah.com
	</footer>
	
	</html>
	

