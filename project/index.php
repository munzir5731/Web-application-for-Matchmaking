<?php
include "login.php"; // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
</body>
</html>