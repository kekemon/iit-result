
<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
    session_start();

	if(!isset($_SESSION['myusername']) || !isset($_SESSION['mypassword'])){
		header("location:login.php");
	}
	
	$type = $_GET['type']; 
	$course = $_GET['course'];
	
	if(!isset($type) || !isset($course)){
		header("location:index.php");
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
        <a class="nav-link" href="final-result.php">Generate Result</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button onclick="location.href='logout.php';" class="btn btn-outline-success my-2 my-sm-0" type="button">Logout</button>
    </form>
  </div>
</nav>
<br>
  <form action="result-post.php" method='post'>
	<input name='course'  value=<?php echo $course ?> hidden/>
	<input name='type'  value=<?php echo $type ?> hidden/>
	<table align="center" width="75%" border="0" cellspacing="0" cellpadding="5">
	  <tr>
		  <td align="center">Name</td>
		  <td align="center">Roll</td>
		  <td align="center">Class Test</td>
		  <td align="center">Final Test</td>
	  </tr>
	<?php
		$sql="SELECT full_name, student.roll, nvl(ct,0) ct, nvl(final,0) final FROM student LEFT JOIN result ON student.roll=result.roll AND course='$course' and type='$type'";
		$result=mysqli_query($conn, $sql);
		while($row = $result->fetch_assoc()) {
			//echo "<script>  addtoTable('$student_id', '$last_name', '$phone_number', '$book_id', '$title', '$author', '$borrowedDate'); </script>" ;
			echo "<tr>";
			echo "<td align=\"center\">$row[full_name]</td>";
			echo "<td align=\"center\"><input name='roll[]'  value='$row[roll]' readonly/></td>";
			echo "<td align=\"center\"><input name='ct[]' size='15' type='number' value='$row[ct]' min='0' max='40' required></td>";
			echo "<td align=\"center\"><input name='final[]' size='15' type='number' value='$row[final]' min='0' max='60' required></td>";
			echo "</tr>";
		}
	?>
	  <tr>
		<td colspan="4" align="center"><button  class="btn btn-success" type="submit">Submit</button></td>
	  </tr>
	</table>
  </form>
</body>
   

</html>

