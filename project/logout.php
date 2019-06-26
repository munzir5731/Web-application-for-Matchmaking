<?php
session_start();
session_destroy();
header("Location: main.php"); // Redirecting To Home Page

?>