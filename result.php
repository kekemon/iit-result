
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

<?php   
	$type = $_GET['type']; 
	$course = $_GET['course'];
?>	

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
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
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
	  <tr class="oddrow">
		<td align="center">Kazi Emrul Kayes Emon</td>
		<td align="center"><input name='roll[]'  value="201130"/></td>
		<td align="center"><input name='ct[]' size="15" type="number" min="0" max="40" required></td>
		<td align="center"><input  name='final[]' size="15" type="number" min="0" max="60" required></td>
		
	  </tr>
	  <tr class="oddrow">
		<td align="center">Robiul Islam</td>
		<td align="center"><input name='roll[]' value="201102"/></td>
		<td align="center"><input name='ct[]' size="15" type="number" min="0" max="40" required></td>
		<td align="center"><input  name='final[]' size="15" type="number" min="0" max="60" required></td>
		
	  </tr>
	  <tr class="oddrow">
		<td align="center">Minhaz Ahmed</td>
		<td align="center"><input name='roll[]' value="201103"/></td>
		<td align="center"><input name='ct[]' size="15" type="number" min="0" max="40" required></td>
		<td align="center"><input  name='final[]' size="15" type="number" min="0" max="60" required></td>
		
	  </tr>
	  <tr class="oddrow">
		<td align="center">Alvy Ibn Firoz</td>
		<td align="center"><input name='roll[]' value="201104"/></td>
		<td align="center"><input name='ct[]' size="15" type="number" min="0" max="40" required></td>
		<td align="center"><input  name='final[]' size="15" type="number" min="0" max="60" required></td>
		
	  </tr>
	  <tr class="oddrow">
		<td align="center">Siam Ansary</td>
		<td align="center"><input name='roll[]' value="201105"/></td>
		<td align="center"><input name='ct[]' size="15" type="number" min="0" max="40" required></td>
		<td align="center"><input  name='final[]' size="15" type="number" min="0" max="60" required></td>
	  </tr>
	  <tr>
		<td colspan="4" align="center"><button  class="btn btn-success" type="submit">Submit</button></td>
	  </tr>
	</table>
  </form>
</body>
   

</html>

