<?php
	session_start();
	unset($_SESSION['myusername']);
	unset($_SESSION['mypassword']);
	header("Location:login.php");
?>