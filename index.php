<?php 
// Copyright M.Adeel
//include 'createdb.php'; // this file contain createdb() method
//createdb(); // check if database is created or not  , if not it create it and insert basic data in it.

session_start();// session started
if(isset($_SESSION['Name'])){ /*
 this check if user is log in  by checking $_SESSION['Name'] variable  */
	if($_SESSION['Name'] == 'admin'){/* this checks if user is a admin or not , if its admin then this is page
	is directed to adminlogin.php page*/
		header("Location: adminlogin.php"); 
exit();
	}
	else {
		/* if  user is log in and it is not admin then this page is directed to studentlogin.php page*/
		
		header("Location: studentlogin.php"); 
exit();
		
	}
	
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home - Online Test</title>

<?php 
$error1 = "";// this will be use for displaying error (Username or password is incorrect)
$error = "";// this will be use for displaying sql connect errors

    if(isset($_POST['username'])){ /* this if checks is form is submitted by checking that $_POST['username'] is set or exists */

   include 'connection.php'; /* this file contains variables used for connecting to database ($server,$username,$password,$dbname)*/

$conn = new mysqli($server, $username, $password);// this create connection

if ($conn->connect_error) { //  this checks if there error connecting to server
	$error = die("Connection failed: " . $conn->connect_error); // saves error  in $error
    
} 

$username =  trim(htmlspecialchars($_POST['username']));/* this will trim(remove extra spaces) and remove html tags from username*/
$password= trim(htmlspecialchars($_POST['password']));/* this will trim(remove extra spaces) and remove html tags from password*/

$sql = 'SELECT * FROM '.$dbname.'.studentlogin '; //query for selecting data from studentlogin table
$result = $conn->query($sql); // 

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($row['StUserName'] == $username && $row['StPassword'] == $password){
			session_start();
		    $_SESSION['Name'] =  $row['StName'];
			$_SESSION['Id'] = $row['StId'];
			
			
			header("Location: studentlogin.php"); /* Redirect browser */
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
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <h1 style="float:left; color:#494CE9; font-family:Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace;"> Online Test </h1>
    <a href="admin.php"><button style="float:right; margin:2%;" class="btn btn-default"> Admin Panel </button></a>
      
</div></nav>

<div class="container text-center" >
  
  <h2>Student Log In </h2> 
 
  <hr>
  
    
    <form action="index.php" method="post" >
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">UserName:</label>
      <input placeholder="Enter You Username..." type="text" class="form-control" name="username"required> 
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
