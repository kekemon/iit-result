
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
      <button onclick="location.href='logout.php';" class="btn btn-outline-success my-2 my-sm-0" type="button">Logout</button>
    </form>
  </div>
</nav>
<br>
  <form action="result-post.php" method='post'>
	<table align="center" width="75%" border="0" cellspacing="0" cellpadding="5">
	  <tr>
		  <td align="center">Name</td>
		  <td align="center">Roll</td>
		  <td align="center">MITM-306</td>
		  <td align="center">MITM-307</td>
		  <td align="center">MITM-308</td>
	  </tr>
	<?php
		$sql1="SELECT * from student";
		$students=mysqli_query($conn, $sql1);
		
		$sql2="SELECT * from courses";
		
		
		while($student = $students->fetch_assoc()) {
			?>
			<tr>
			<td align="center"><?php echo $student['full_name']?></td>
			<td align="center"><?php echo $student['roll']?></td>
			
			<?php
			$roll=$student['roll'];
			$courses=mysqli_query($conn, $sql2);
			while($course = $courses->fetch_assoc()) {
				$code=$course['code'];
				$midsql="select ct+final sum from result where course='$code' and type='mid' and roll='$roll'";
				$finalsql="select ct+final sum from result where course='$code' and type='final' and roll='$roll'";
				
				$result3=mysqli_query($conn, $midsql)->fetch_assoc();
				$result4=mysqli_query($conn, $finalsql)->fetch_assoc();
				$mid =$result3['sum'];
				$final= $result4['sum'];
				$avg = ($mid + $final)/2;
				
				$max = $avg*1.2;
				$min = $avg*0.8;
				$result = $avg;
				if ($mid>$max ||  $final>$max || $mid<$min  || $final<$min) {
					$result="20% deviation";
				}
				?>
				<td align="center"><?php echo $result;?></td>
			
				<?php
				//echo $avg;
			}
			?>
			</tr>
			<?php
		}
	?>
	  
	</table>
  </form>
</body>
   

</html>

