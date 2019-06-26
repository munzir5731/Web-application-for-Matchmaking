<!DOCTYPE html>

<?php
	include "header.php";
?>

<?php

// Create database connection
  $db = mysqli_connect("localhost", "root", "", "project");
  if($login=="true"){
	$user_check=$_SESSION['login_user'];
	  
  $result = mysqli_query($db, "SELECT * FROM person_details where Email != '$user_check'");
  }
  else{$result = mysqli_query($db, "SELECT * FROM person_details");}
  
  

?>


	
	<body>
	
	
	<div class="container-fluid text-center">    
	
	<button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>
	
	  <div class="row content">
		<div class="col-sm-3 sidenav">
		<div class="search-filter">
		<div style="height:35px; background-color:#c0c0c0"><h4 style="padding-top:8px; margin:0px;">Filter Search</h4></div>
		
		<div>
		<h5>Gender</h5>
		<div class="search-filter-option">
		<form id="form" method="post" action="">
		  <input type="checkbox" name="all" class="chk" <?=(isset($_POST['all'])?' checked':'')?>/> All<br>
		  <input type="checkbox" name="female" class="chk" <?=(isset($_POST['female'])?' checked':'')?>/> Female<br>
		  <input type="checkbox" name="male" class="chk" <?=(isset($_POST['male'])?' checked':'')?>/> Male<br>

		</form>
		</div>

		</div>
		<div>
		<h5>Monthly Income</h5>
		<div class="search-filter-option">
		<form action="">
		  <input type="checkbox" name="Monthly Income"> All<br>
		  <input type="checkbox" name="Monthly Income"> Up to 50K<br>
		  <input type="checkbox" name="Monthly Income"> up to 100K<br>
		  <input type="checkbox" name="Monthly Income"> up to 200k<br>
		  <input type="checkbox" name="Monthly Income"> More than 200k<br>
		</form>
		</div>

		</div>
		<div>
		<h5>Marital Status</h5>
		<div class="search-filter-option">
		<form action="">
		  <input type="checkbox" name="Marital Status"> All<br>
		  <input type="checkbox" name="Marital Status"> Never Married<br>
		  <input type="checkbox" name="Marital Status"> Divorced<br>
		  <input type="checkbox" name="Marital Status"> Widowed<br>
		</form>
		</div>
		</div>

		</div>
		</div>
	<?php 
	
	if($login=="true"){
		$user_check=$_SESSION['login_user'];
		if (isset($_POST["all"])){
		$result = mysqli_query($db, "SELECT * FROM person_details where Email != '$user_check'");
		
		}
		else if (isset($_POST["female"]) && isset($_POST["male"])){
		$result = mysqli_query($db, "SELECT * FROM person_details where Email != '$user_check'");
		}
		
		else if (isset($_POST["female"])){
		$result = mysqli_query($db, "SELECT * FROM person_details where gender='Female' && Email != '$user_check'");
		}
		
		
		else if (isset($_POST["male"])){
		$result = mysqli_query($db, "SELECT * FROM person_details where gender='Male' && Email != '$user_check'");
		}
	}
	else{
		if (isset($_POST["all"])){
		$result = mysqli_query($db, "SELECT * FROM person_details");
		
		}
		else if (isset($_POST["female"]) && isset($_POST["male"])){
		$result = mysqli_query($db, "SELECT * FROM person_details");
		}
		
		else if (isset($_POST["female"])){
		$result = mysqli_query($db, "SELECT * FROM person_details where gender='Female'");
		}
		
		
		else if (isset($_POST["male"])){
		$result = mysqli_query($db, "SELECT * FROM person_details where gender='Male'");
		}
	}
	
	include "display.php";
?>
		
		
		
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

 <script type="text/javascript">  
    $(function(){
     $('.chk').on('change',function(){
        $('#form').submit();
        });
    });
</script>

	</body>
	

