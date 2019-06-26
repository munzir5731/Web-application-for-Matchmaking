<?php
session_start();// Starting Session

if(!isset($_SESSION['login_user'])){
	header("location: login.php");
}

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$db = mysqli_connect("localhost", "root", "", "project");

// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($db, "SELECT * FROM person_details where Email='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);

$login_session =$row['Email'];
if(strcmp($user_check,$login_session) !=0){

header('Location: index.php'); // Redirecting To Home Page
}
?>