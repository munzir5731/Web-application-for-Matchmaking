<?php
session_start();// Starting Session
?>
<html lang="en">
	<head>
	<title>Home</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
	</head>
	
	<?php
	$login="";
	if(!isset($_SESSION['login_user'])){
		?>
		<style type="text/css">#logout{
		display:none !important;
		}
		#profile{
		display:none !important;
		}</style>
		<?php
	}
	else{
		?>
		<style type="text/css">#login{
		display:none !important;
		}</style>
		<?php
		$login="true";
	}
	?>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="#">Logo</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class="active"><a class="menu_item" href="#">Home</a></li>
			<li id="profile"><a class="menu_item" href="profile.php">Profile</a></li>
			<li><a class="menu_item" href="#">More</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li id="logout"><a class="menu_item" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			<li id="login"><a class="menu_item"  href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	</html>