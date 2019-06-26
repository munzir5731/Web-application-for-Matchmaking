
<?php
		session_start(); // Starting Session
		
		include "loginValidation.php";
	
?>

<html lang="en">
	<head>
	  <title>Login</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="login.css">
	  
	</head>


	


	
	
	<body Style="margin:0px;padding:0px;font-family:sans-serif;">
	<div class="login_body">
		<div id="header"><h3 id="head_text"><a style="text-decoration:none; color:#ff3333;" href="main.php">Bibah.com</a></h3></div>
		<div class="login-form-div">
			<form method="post" action="login.php">  
					
					<h4 class="line-details">
						<span class="field-value"><input type="text" name="Email" placeholder="Enter your Email" value="<?php echo $email ?>"></span>
						<span class="error"><?php echo $emailErr;?></span>
					</h4>
					
					<h4 class="line-details">
						<span class="field-value"><input type="password" name="Password" placeholder="Password" value="<?php echo $password ?>"></span>
						<span class="error"><?php echo $passwordErr;?></span>
					</h4>
					
					<input type="submit" name="login" value="Login">
					<p class="error" style="color: #FF0000; font-size:13px; padding-left:5px; font-weight:normal; height:15px; margin:5px 0px 0px;0px;"><?php echo $log_error_msg;?></p>
					<p style="margin-bottom:0px; color:White; font-size:13px;">Don't have account? <a href="registration.php" style=" color:#ffff00;text-decoration:none;"> Sign Up here</a></p>
					
				</form>
		
		
		</div>
		</div>
	
	
	</body>
	

	<footer>© Copyright 2018. All rights reserved by bibah.com
	</footer>
	
	</html>
	

