<?php 
session_start();
if(!($_SESSION['Name']=='admin')){
	header("Location: index.php"); /* Redirect browser */
exit();
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
   
    <a href="Logout.php" > <button style="float:right; margin:2%;" class="btn btn-default"><span class="glyphicon glyphicon-log-out"> </span>  Log Out</button></a>
      
</div></nav>

<div class="container text-center" style="text-align:center;">
  
  <h1>Welcome <?php echo $_SESSION['Name'];?> </h1> 
  <hr>
   
   <h1><div style="width:100%; text-align:center; padding:5%; padding-top:2%; margin-left:8%;" >
  <a href="addstudent.php"><div class="col-lg-3 col-md-4 table-bordered" style="margin:10px; background:white; padding:15px;  text-align:center">
   <span class="glyphicon glyphicon-check"></span> Add a <br> Student </div></a>
   <a href="deletestudent.php"><div class="col-lg-3 col-md-4 table-bordered" style="margin:10px; background:white; padding:15px;  text-align:center">
   <span class="glyphicon glyphicon-trash"></span> Delete a <br> Student </div></a>
   <a href="admincheckmarks.php"><div class="col-lg-3 col-md-4 table-bordered" style="margin:10px; background:white; padding:15px;  text-align:center">
   <span class="glyphicon glyphicon-stats"></span> Check <br> Marks</div></a>
   <a href="addquestion.php"><div class="col-lg-3 col-md-4 table-bordered" style="margin:10px; background:white; padding:15px;  text-align:center">
   <span class="glyphicon glyphicon-question-sign"></span> Add a <br> Question</div></a>
   <a href="deletequestion.php"><div class="col-lg-3 col-md-4 table-bordered" style="margin:10px; background:white; padding:15px;  text-align:center">
   <span class="glyphicon glyphicon-remove-circle"></span> Remove a  <br> Question</div></a>
   <a href="changepassword.php"><div class="col-lg-3 col-md-4 table-bordered" style="margin:10px; background:white; padding:15px;  text-align:center">
   <span class="glyphicon glyphicon-cog"></span> Change<br> Password </div></a>
   </div>
   </h1> 
    <br><br><br><br><div class="col-lg-12"><h4><b>&copy; M.Adeel</b></h4></div></div> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
