<?php 
session_start();
if(!($_SESSION['Name']=='admin')){
	header("Location: index.php"); /* Redirect browser */
exit();
}
$error1= "";
$error2 = "";
$error = "";

    if(isset($_POST['question'])){

   include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$question= $_POST['question'];
$op1 = $_POST['op1'];
$op2 = $_POST['op2'];
$op3 = $_POST['op3'];
$op4 = $_POST['op4'];
$correct = $_POST['correct'];
$sql = "INSERT INTO ".$dbname.".questions (question,op1, op2, op3,op4,correctanswer)
VALUES ( '$question', '$op1','$op2', '$op3', '$op4', '$correct'  )";
if ($conn->query($sql) === TRUE) {
	
	$error2 = "Question Added Successfully !";
	
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
  
  <h1> Add a Question:</h1> 
  <hr>
  <div style="width:80%; margin-left:10%; text-align:center"><div style="width:80%; margin-left:10%; text-align:left;">
      <form action="addquestion.php" method="post" >
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">Question:  </label>
      <input placeholder="Enter Question..." type="text" class="form-control" name="question" required> 
    </div>
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">Option 1: </label>
      <input placeholder="Enter option 1.." type="text" class="form-control" name="op1" required> 
    </div>
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">Option 2: </label>
      <input placeholder="Enter option 2.." type="text" class="form-control" name="op2" required> 
    </div><div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">Option 3: </label>
      <input placeholder="Enter option 3.." type="text" class="form-control" name="op3" required> 
    </div>
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">Option 4: </label>
      <input placeholder="Enter option 4.." type="text" class="form-control" name="op4" required> 
    </div>
    <div class="form-group text-left center-block" style=" width:50%;" >
      <label for="usr">Correct Answer:&nbsp; </label>
      <select style="color:black; padding:2px; font-size:15px" name="correct"> <option value="1"> Option 1 </option>
      <option value="2"> Option 2 </option>
      <option value="3"> Option 3 </option>
      <option value="4"> Option 4 </option>
       </select>
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
