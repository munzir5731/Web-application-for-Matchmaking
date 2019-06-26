<!DOCTYPE html>

<?php
	include "header_details.php";
?>

<?php

// Create database connection
  $db = mysqli_connect("localhost", "root", "", "project");
  
  
  if(isset($_GET['post_id'])){
	  
	  $get_post=$_GET['post_id'];
  $result = mysqli_query($db, "SELECT * FROM person_details where `id`='$get_post'");
  
  }
?>

	


	
	<body>
	
	<div class="container-fluid text-center"> 
	    
	
	  <div class="details_container">
		<div class="details_area"> 
		
		<?php
		
		while ($row = mysqli_fetch_assoc($result)) {
		
		$height_total=$row["Height"];
		$height_feet=intdiv($height_total, 12);
		$height_inch=$height_total%12;
		
		$_age = floor((time() - strtotime($row["dob"])) / 31556926);
			
			
		?>
			
			<div id="details_image">
				<img src="images/<?php echo $row["photo"];?>" style="width:auto; height:100%; max-width:100%;">
			</div>
			<div id="details_text_container">
				<div id ="details_text_details">
					<h4 class="line-details">
						<span class="field-title">Name</span>
						<span class="field-separator"> : </span>
						<span class="field-value_details"><?php echo $row["Name"]; ?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Age & Height </span>
						<span class="field-separator">: </span>
						<span class="field-value_details"><?php echo $_age;?> , <?php echo "$height_feet' $height_inch\"";?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Religion</span>
						<span class="field-separator">: </span>
						<span class="field-value_details"><?php echo $row["Religion"];?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Location</span>
						<span class="field-separator">: </span>
						<span class="field-value_details"><?php echo $row["Location"];?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Education</span>
						<span class="field-separator">: </span>
						<span class="field-value_details"><?php echo $row["Education"];?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Profession</span>
						<span class="field-separator">: </span>
						<span class="field-value_details"><?php echo $row["Profession"];?></span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Income per month</span>
						<span class="field-separator">: </span>
						<span class="field-value_details"><?php echo $row["Income"];?> Tk</span>
					</h4>
					<h4 class="line-details">
						<span class="field-title">Email</span>
						<span class="field-separator">: </span>
						<span class="field-value_details"><?php echo $row["Email"];?></span>
					</h4>
				</div>
			</div>

		  
		  <?php
		  
		}
		
		?>
		  
		  
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
	

