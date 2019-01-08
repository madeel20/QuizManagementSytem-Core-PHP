<?php 
session_start();
if(!($_SESSION['Name']=='admin')){
	header("Location: index.php"); /* Redirect browser */
exit();
}
$error1= "";
$error2 = "";
$error = "";

    if(isset($_POST['username'])){

   include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$name= $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO ".$dbname.".studentlogin (StName,StUserName, StPassword)
VALUES ( '$name', '$username'  , '$password'  )";
if ($conn->query($sql) === TRUE) {
	
	$error2 = "Student Added Successfully !";
	
} else {
    $error =  $conn->error;
}

		
        
    

$conn->close();
	
	
	 
}
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
  
  <h1> Add a Student:</h1> 
  <hr>
  <div style="width:80%; margin-left:10%; text-align:center"><div style="width:80%; margin-left:10%; text-align:left;">
      <form action="addstudent.php" method="post" >
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">Student Name:  </label>
      <input placeholder="Enter Student Name..." type="text" class="form-control" name="name" required> 
    </div>
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">UserName:  </label>
      <input placeholder="Enter Username.." type="text" class="form-control" name="username" required> 
    </div>
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="pwd">Password:</label>
      <input placeholder="Enter Password..." type="text" class="form-control" name="password" required> <?php echo '<p style="color:red">'.$error. $error1. "</p>"?>
    </div>
    <center><h4><input id="submit"  type="submit" class="btn-primary" value=" Add "/> <button class="btn-primary" type="reset" > Clear </button></h4>
  </form>
  <p> <?php echo $error2 ?></p>
   </div>
  </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
