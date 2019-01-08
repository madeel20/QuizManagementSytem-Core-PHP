<?php 
session_start();
if(!($_SESSION['Name'])){
	header("Location: index.php"); /* Redirect browser */
exit();
}
else  if($_SESSION['Name'] == 'admin'){
	
		header("Location: adminlogin.php"); /* Redirect browser */
exit();

}
include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$id =$_SESSION['Id'];
$sql = "SELECT * FROM ".$dbname.".studentmarks where StId = $id ";
$result = $conn->query($sql);

	

		
		

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_SESSION['Name'];?> -Online Test</title>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
   <a href="studentlogin.php" > <button style="float:left; margin:2%;" class="btn btn-default"><span class="glyphicon glyphicon-backward"> </span> Back</button></a>
    <a href="Logout.php" > <button style="float:right; margin:2%;" class="btn btn-default"> <span class="glyphicon glyphicon-log-out"> </span> Log Out</button></a>
      
</div></nav>

<div class="container text-center" style="text-align:center;">
  
  <h1> Marks Record:</h1> 
  <hr>
  <div style="width:80%; margin-left:10%;"><div style="width:60%; margin-left:20%; text-align:left;">
     <table class="table-bordered table-hover table-responsive" style="font-size:20px; text-align:center; width:100%"><tr style="background:black; color:white;" > <th style="text-align:center;"> Total Questions</th> <th style="text-align:center;"> Correct Answers</th><th style="text-align:center;"> Date & Time </th></tr>
     <?php 
	 
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$perc = ($row['ObtMarks']/$row['TotalMarks'])*100;
		if($perc < 50){
			echo "<tr style= 'background:red; color:white;'><td>". $row['TotalMarks'] . "</td><td>".$row['ObtMarks']."</td><td>" . $row['date_time']."</td></tr>";
		}
		else {
			
		
	echo "<tr><td>". $row['TotalMarks'] . "</td><td>".$row['ObtMarks']."</td><td>" . $row['date_time']."</td></tr>";
		}
		}
	 ?>
     
     </table>
   </div>
  </div> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
