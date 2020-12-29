<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "iit_db";
	$tbl_name="users"; // Table name 

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		echo "Database Connection failed ";
        echo '<a href="main_login.php"><button>back</button></a>';
	}

?>