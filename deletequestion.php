<?php 
session_start();
if(!($_SESSION['Name']=='admin')){
	header("Location: index.php"); /* Redirect browser */
exit();
}
 $error2="";
if(isset($_POST['ans'])){//to run PHP script on submit
if(!empty($_POST['questionid'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['questionid'] as $id){
	include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$sql = "DELETE from ".$dbname.".questions where Id = $id";

if ($conn->query($sql) === TRUE) {
	
	$error2 = "Question Deleted Successfully !";
	
} else {
    $error =  $conn->error;
}

}
}
}
$error1= "";
$error = "";
  include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$sql = "select * from ".$dbname.".questions";
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
  
  <h1> Delete Questions:</h1>
  <hr>
  <div style="width:100%; margin-left:5%; text-align:center"><div style="width:80%; margin-left:5%; text-align:left;">
      <form action="deletequestion.php" method="post" style="background:white; border:1px solid black; color:black;" >
      <center><h3><button name="" type="submit"> Delete </button></h3></center>
      <table class="table-bordered table-hover table-responsive" style="font-size:20px; text-align:center; width:100%"> <tr  style="background:black; color:white;"> <th style="text-align:center"> </th><th style="text-align:center"> Question</th><th style="text-align:center">option 1 </th><th style="text-align:center"> option 2</th><th style="text-align:center"> option 3</th><th style="text-align:center"> option 4</th><th style="text-align:center"> correct answer</th>
      <?php 
	  while($row = $result->fetch_assoc()) {
		  
			echo "<tr style='font-size:15px;'><td>".'<input type="checkbox" name="questionid[]" value="'.$row["Id"].'"/>'. "</td><td>". $row['question'] . "</td><td>". $row['op1'] . "</td><td>".$row['op2']."</td><td>". $row['op3'] . "</td><td>". $row['op4'] . "</td><td>". $row['correctanswer'] . "</td></tr>" ;
		
	  }
	  ?>
      
       </table>
    <input type="hidden" name="ans" value="1"/>
  </form>
  <p> <?php echo '<center><h3 style=" color:white;">'.$error2.'</h3></center>' ?></p>
   </div>
  </div></div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
