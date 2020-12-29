
<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
    session_start();

	if(!isset($_SESSION['myusername']) || !isset($_SESSION['mypassword'])){
		header("location:login.php");
	}
	
	require_once("db-connection.php");
?>



<html>
<head>
<title>Result Generation</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<style>
* {
	 font-family: "Times New Roman", Times, serif;
}

table, th, td {
  border: 1px solid black;
}

td,tr {
	width: 16.67%;
}

a, p {
	font-size:20px;
}



</style>


<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">IIT, DU</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Generate Result</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button  onclick="location.href='logout.php';" class="btn btn-outline-success my-2 my-sm-0" type="button">Logout</button>
    </form>
  </div>
</nav>
<br>
 
 
</body>
   
<?php   
			
		if($_POST){ 
			$roll = $_POST['roll']; 
			$ct = $_POST['ct'];
			$final = $_POST['final'];
			$course = $_POST['course'];
			$type = $_POST['type'];
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "iit_db";
			$tbl_name="result"; // Table name 
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				echo "Database Connection failed ";
				echo '<a href="register.php"><button>back</button></a>';
			}else {
				$delsql = "DELETE FROM $tbl_name WHERE course='$course' and type='$type'";
				mysqli_query($conn, $delsql);
					
				for ($i = 0; $i < count($roll); $i++) {
					$sql = "INSERT INTO $tbl_name (roll, course, type, ct, final) VALUES 
					('$roll[$i]', '$course', '$type', $ct[$i], $final[$i])";
					if(mysqli_query($conn, $sql) == false) {
						echo '<script>alert("Error Occured")</script>'; 
						return;
					}
				}

				echo '<h5 align="center">Successfully Added</h5>'; 
						
			}

			
		}			
?> 

</html>

