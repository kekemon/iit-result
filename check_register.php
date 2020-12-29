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
        echo '<a href="register.php"><button>back</button></a>';
	}


	// username and password sent from form 
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 
    $my_fullname=$_POST['my_fullname']; 

	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
    $my_fullname = stripslashes($my_fullname);

	$myusername = mysqli_real_escape_string($conn, $myusername);
	$mypassword = mysqli_real_escape_string($conn, $mypassword);
	$my_fullname = mysqli_real_escape_string($conn, $my_fullname);

    $my_password_hash = hash('sha512', $mypassword);

	$sql="SELECT * FROM $tbl_name WHERE BINARY username='$myusername' and password='$my_password_hash'";

	$sql = 
        "INSERT INTO $tbl_name (username, password, full_name)
	   VALUES 
    ('$myusername', '$my_password_hash', '$my_fullname')";
	
    
    if (mysqli_query($conn, $sql)) {
		//echo "Register successfully";
        //echo '<a href="login.php"><button>Login</button></a>';
		header("location:index.php");
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>

