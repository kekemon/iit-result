
<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
    session_start();

	if(!isset($_SESSION['myusername']) || !isset($_SESSION['mypassword'])){
		header("location:login.php");
	}

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
        <a class="nav-link" href="#">Generate Result</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav>


<form name="marksForm" action="actionpage_2.php" method="post">

 
<br>

<div class="row mr-auto ml-auto">
    <div class="col-md-4">
		<div class="card border-success mb-4" style="width: 18rem;">
		  <div class="card-header">MITM 306</div>
		  <div class="card-body">
			<h5 class="card-title">Web Tech and Internet Computing</h5>
			<a href="result.php?type=mid&course=mitm-306" class="card-link">Mid</a>
			<a href="result.php?type=final&course=mitm-306" class="card-link">Final</a>
		  </div>
		</div>
	</div>
	
    <div class="col-md-4">
		<div class="card border-success mb-4" style="width: 18rem;">
		  <div class="card-header">MITM 307</div>
		  <div class="card-body">
			<h5 class="card-title">Cryptography and Security Mechanisms</h5>
			<a href="result.php?type=mid&course=mitm-307" class="card-link">Mid</a>
			<a href="result.php?type=final&course=mitm-307" class="card-link">Final</a>
		  </div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="card border-success mb-4" style="width: 18rem;">
		  <div class="card-header">MITM 308</div>
		  <div class="card-body">
			<h5 class="card-title">Software Project Management Studies</h5>
			<a href="result.php?type=mid&course=mitm-308" class="card-link">Mid</a>
			<a href="result.php?type=final&course=mitm-309" class="card-link">Final</a>
		  </div>
		</div>
	</div>
  </div>
</body>
    

</html>

