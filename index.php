
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
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
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

<div class="row mr-auto ml-auto">
<?php 
	$sql="SELECT * FROM courses";

	$result=mysqli_query($conn, $sql);
	while($row = $result->fetch_assoc()) {
	?>
		<div class="col-md-4">
		<div class="card border-success mb-4" style="width: 18rem;">
		  <div class="card-header"><?php echo $row['code']?></div>
		  <div class="card-body">
			<h5 class="card-title"><?php echo $row['title']?></h5>
			
			<a href="result.php?type=mid&course=<?php echo $row['code']?>" class="card-link">Mid</a>
			<a href="result.php?type=final&course=<?php echo $row['code']?>" class="card-link">Final</a>
		  </div>
		</div>
		</div>
	<?php
	}
?>
    
  </div>
</body>
    

</html>

