<?php 
session_start();
if(!($_SESSION['Name']=='admin')){
	header("Location: index.php"); /* Redirect browser */
exit();
}
 
if(isset($_POST['ans'])){//to run PHP script on submit
if(!empty($_POST['studentid'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['studentid'] as $id){
	include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$sql = "DELETE from ".$dbname.".studentmarks where StId = $id";

if ($conn->query($sql) === TRUE) {
	
	$error2 = "Student Added Successfully !";
	
} else {
    $error =  $conn->error;
}
$sql = "DELETE from ".$dbname.".studentlogin where StId = $id";

if ($conn->query($sql) === TRUE) {
	
	$error2 = "Student  Deleted Successfully !";
	
} else {
    $error =  $conn->error;
}
	

}
}
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
$sql = "select * from ".$dbname.".studentlogin";
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
  
  <h1> Delete Students: </h1>
  <hr>
  <div style="width:80%; margin-left:10%; text-align:center"><div style="width:80%; margin-left:10%; text-align:left;">
      <form action="deletestudent.php" method="post" style="background:white; border:1px solid black; color:black;" >
      <center><h3><button name="" type="submit"> Delete </button></h3></center>
      <table class="table-bordered table-hover table-responsive" style="font-size:20px; text-align:center; width:100%"> <tr > <th style="text-align:center"> </th><th style="text-align:center"> Id</th><th style="text-align:center"> Student Name</th><th style="text-align:center"> UserName</th>
      <?php 
	  while($row = $result->fetch_assoc()) {
		  
			echo "<tr><td>".'<input type="checkbox" name="studentid[]" value="'.$row["StId"].'"/>'. "</td><td>". $row['StId'] . "</td><td>". $row['StName'] . "</td><td>".$row['StUserName']."</td></tr>" ;
		
	  }
	  ?>
      
       </table>
    <input type="hidden" name="ans" value="1"/>
  </form>
  <p> <?php echo $error2 ?></p>
   </div>
  </div></div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
