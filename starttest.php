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

	
$buttontext = "Next Question";

if(!(isset($_SESSION['incr']))){
	$_SESSION['incr'] = 0;
	$_SESSION['correct'] =0;
	
}


if (isset($_POST['action'])){
	
	if($_POST['answer'] == $_SESSION['questions'][$_SESSION['incr']]["correctanswer"] ){
		
		$_SESSION['correct']++;
	}

	
	
	if($_SESSION['incr'] < $_SESSION['qindex']-1){
		
	
			$_SESSION['incr'] = $_SESSION['incr']+1; 
			if($_SESSION['incr'] == $_SESSION['qindex']-1){
				$buttontext = "Submit";
				$s=1;
				
			}
	}
	else {
		// coding for submitting answers
		include 'connection.php';
// Create connection
$conn = new mysqli($server, $username, $password);
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
    
} 
$id= $_SESSION["Id"];
$total = ($_SESSION["qindex"]);
$obt = $_SESSION["correct"] ;
$sql = "INSERT INTO ".$dbname.".studentmarks (StId,TotalMarks, ObtMarks)
VALUES ( '$id', '$total'  , '$obt'  )";
if ($conn->query($sql) === TRUE) {
	
	unset($_SESSION["qindex"], $_SESSION["correct"] , $_SESSION['questions'] ,$_SESSION['obtmarks'] ,$_SESSION['incr']   );
	
    header("Location: studentlogin.php"); /* Redirect browser */
exit();
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		
	
	
	}
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


if(!(isset($_SESSION['questions']))){
	$questionnow = array();
include 'connection.php';
$error;
// Create connection
$conn = new mysqli($server, $username, $password);
if ($conn->connect_error) {
	$error = die("Connection failed: " . $conn->connect_error);
	
	
    
} 
$sql = 'SELECT * FROM '.$dbname.'.questions';
$result = $conn->query($sql);
	$_SESSION['questions']= array();
	$_SESSION['qindex'] = 0;
	$_SESSION['obtmarks'] = 0;
	
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		array_push($_SESSION['questions'], array("id" => $row["Id"], "question" => $row["question"], "op1" => $row["op1"],"op2" => $row["op2"],"op3" => $row["op3"],"op4" => $row["op4"], "correctanswer" => $row["correctanswer"] ));
		$_SESSION['qindex']++;	
		}}}
		else {
			
			
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
   <a href="studentlogin.php" > <button style="float:left; margin:2%;" class="btn btn-default"><span class="glyphicon glyphicon-backward"> </span> Back</button></a>
    <a href="Logout.php" > <button style="float:right; margin:2%;" class="btn btn-default"> <span class="glyphicon glyphicon-log-out"> </span> Log Out</button></a>
      
</div></nav>

<div class="container text-center" style="text-align:center;">
  
  <h1> Questions:</h1> 
  <hr>
  <div style="width:80%; margin-left:10%;"><div style="width:60%; margin-left:20%; text-align:left;">
  <form action="starttest.php" method="post">
   <p style="font-size:36px"> Q.<?php echo $_SESSION['incr']+1 ?> <?php echo $_SESSION['questions'][$_SESSION['incr']]["question"]; ?></p>
   <span style="font-size:24px"><p>  <input type="radio" value="1" name="answer" checked/> <?php echo " ".$_SESSION['questions'][($_SESSION['incr'] )]["op1"]; ?></p>
      <p>  <input type="radio" value="2" name="answer"/><?php echo " ".$_SESSION['questions'][($_SESSION['incr'])]["op2"]; ?></p>
         <p>  <input type="radio" value="3" name="answer"/><?php echo " ".$_SESSION['questions'][($_SESSION['incr'])]["op3"]; ?></p>
            <p>  <input type="radio" value="4" name="answer"/><?php echo " ".$_SESSION['questions'][$_SESSION['incr']]["op4"]; ?></p></span>
            <input type="submit" value="<?php echo $buttontext;?>"/>
               </div>
               <input type="hidden" name="action" value="submit" />
			   
			   
	
               </form>
   </div>
  </div> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
