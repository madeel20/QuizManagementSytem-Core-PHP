<?php 
session_start();
if(!($_SESSION['Name']=='admin')){
	header("Location: index.php"); /* Redirect browser */
exit();
}
$error1= "";
$error2 = "";
$error = "";
  include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$sql = "SELECT studentlogin.StId, studentlogin.StName, studentmarks.TotalMarks, studentmarks.ObtMarks,studentmarks.date_time
FROM ".$dbname.".studentlogin
INNER JOIN ".$dbname.".studentmarks ON studentlogin.StId = studentmarks.StId";

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
<?php 


   
?>
<link href="css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background:#646BF4; color:white;">
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
   <a href="adminlogin.php" > <button style="float:left; margin:2%;" class="btn btn-default"><span class="glyphicon glyphicon-backward"> </span> Back</button></a>
    <a href="Logout.php" > <button style="float:right; margin:2%;" class="btn btn-default"> <span class="glyphicon glyphicon-log-out"> </span> Log Out</button></a>
      
</div></nav>

<div class="container text-center" style="text-align:center;">
  
  <h1> Students Marks:</h1>
  <hr>
  <div style="width:80%; margin-left:10%;"><div style="width:70%; margin-left:15%; text-align:left;">
     <table class="table-bordered table-hover table-responsive" style="font-size:20px; text-align:center; background:white; color:black; width:100%"><tr style="background:black; color:white;" > <th style="text-align:center;"> Student Id</th> <th style="text-align:center;"> Student Name</th><th style="text-align:center;"> Total Questions </th>
     <th style="text-align:center;"> Obt. Marks </th>
     <th style="text-align:center;"> Date & Time </th></tr>
     <?php 
	 
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$perc = ($row['ObtMarks']/$row['TotalMarks'])*100;
		if($perc < 50){
			echo "<tr style= 'background:red; font-size:15px; color:white;'><td>". $row['StId'] . "</td><td>".$row['StName']."</td><td>" . $row['TotalMarks']."</td><td>".$row['ObtMarks']."</td><td>".$row['date_time']."</td></tr>";
		}
		else {
			
		
	echo "<tr style='font-size:15px; '><td>". $row['StId'] . "</td><td>".$row['StName']."</td><td>" . $row['TotalMarks']."</td><td>".$row['ObtMarks']."</td><td>".$row['date_time']."</td></tr>";
		}
		}
	 ?>
     
     </table>
   </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
