<?php 
session_start();
if(isset($_SESSION['Name'])){
	if($_SESSION['Name'] == 'admin'){
		header("Location: adminlogin.php"); /* Redirect browser */
exit();
	}
	else {
		header("Location: studentlogin.php"); /* Redirect browser */
exit();
		
	}
	
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login - Online Test</title>
<!-- Bootstrap -->
<?php 
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
$sql = 'SELECT * FROM '.$dbname.'.admin ';
$username = trim(htmlspecialchars($_POST['username']));
$password= trim(htmlspecialchars($_POST['password']));

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($row['username'] == $username && $row['password'] == $password){
			session_start();
		    $_SESSION['Name'] =  $row['username'];
			
			
			
			header("Location: adminlogin.php"); /* Redirect browser */
exit();
		}
		else 
		{
			$error1 = "UserName or Password Is Incorrect!";
			
		}
		
        
    }
} 
$conn->close();
	}
	
	 


   
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
    <h1 style="float:left; color:black;  color:#494CE9; font-family:Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace;"> Online Test </h1>
    <a href="index.php"><button style="float:right; margin:2%; " class="btn btn-default"> Student Login </button></a>
      
</div></nav>

<div class="container text-center" >
  
  <h2>Admin Log In </h2> 
 
  <hr>
  
    
    <form action="admin.php" method="post" >
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">UserName:</label>
      <input placeholder="Enter You Username..." type="text" class="form-control" name="username" required> 
    </div>
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="pwd">Password:</label>
      <input placeholder="Enter your Password..." type="password" class="form-control" name="password" required> <?php echo '<p style="color:red">'.$error. $error1. "</p>"?>
    </div>
    <h4><input id="submit"  type="submit" class="btn-primary" value="Log In"/> <button class="btn-primary" type="reset" > Clear </button></h4>
  </form>
  
   <br><b>&copy; M.Adeel</b> </div> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
