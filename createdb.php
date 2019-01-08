<?php 

function createdb(){
	
	include 'connection.php';
	
	$con = new mysqli($server, $username,$password);
	$sql = "SELECT * from ".$dbname.".admin";
	$con->query($sql);
	if($con->error){
		
	include 'connection.php';
	$sql = "CREATE DATABASE ".$dbname." ";
	$con->query($sql);
	$con = new mysqli($server, $username,$password,$dbname);
	
	$sql = "create table studentlogin (
    StId int PRIMARY KEY AUTO_INCREMENT,
    StName varchar(255) not null ,
    StUserName varchar(255) not null ,
    StPassword varchar(255) not null 
    
    );";
	$con->query($sql);
	$sql = "create table studentmarks(
    StId int ,
    TotalMarks int not null ,
    ObtMarks int not null,
    date_time timestamp,
    FOREIGN KEY (StId) REFERENCES studentlogin(StId)
    );";
	$con->query($sql);
	$sql = "create table questions (
    Id int AUTO_INCREMENT UNIQUE,
    question varchar(255) ,
    op1 varchar(50),
    op2 varchar(50),
    op3 varchar(50),
    op4 varchar(50),
    correctanswer int,
    reg_date timestamp
    
    );";
	$con->query($sql);
	$sql = "create table admin(
    username varchar(100),
    password varchar(100)
    );";
	$con->query($sql);
	
	$sql = "insert into admin (username,password)
values ( 'admin', 'admin')";

	$con->query($sql);
	$sql = 'insert into studentlogin (StName,StUserName, StPassword)
VALUES("Adeel","adeel","adeel");';
$con->query($sql);
$sql ='insert into studentlogin (StName,StUserName, StPassword)
VALUES("Ali","ali","ali");';
$con->query($sql);
$sql = 'insert into studentlogin (StName,StUserName, StPassword)
VALUES("Zohaib","zohaib","zohaib");';
$con->query($sql);
$sql = 'insert into studentlogin (StName,StUserName, StPassword)
VALUES("Hamza","Hamza","Hamza");';
$con->query($sql);


$sql = 'insert into studentmarks(StId,TotalMarks,ObtMarks)
VALUES(1,5,4);';
$con->query($sql);
$sql = 'insert into studentmarks(StId,TotalMarks,ObtMarks)
VALUES(2,5,2);';
$con->query($sql);
$sql = 'insert into studentmarks(StId,TotalMarks,ObtMarks)
VALUES(3,5,3);';
$con->query($sql);
$sql = 'insert into studentmarks(StId,TotalMarks,ObtMarks)
VALUES(4,5,1);";';
$con->query($sql);


	$sql = 'insert into questions(question , op1 , op2, op3,op4,correctanswer)
VALUES("What is the meaning of Pakistan?", "Muslim Land", "Land of five rivers", "Desert" , "Holy Land", 4);';
$con->query($sql);
$sql = 'insert into questions(question , op1 , op2, op3,op4,correctanswer)
VALUES("Who is the first Governor General of Pakistan?", "Mohammed Ali Jinnah", "Liaquat Ali Khan", "Ayub Khan" , "Iskander Mirza", 1);';
$con->query($sql);
$sql = 'insert into questions(question , op1 , op2, op3,op4,correctanswer)
VALUES("What was the major event of 1971?", "Explosion of nuclear bomb", "Tashkent Agreement", "Bangladesh broke away from Pakistan" , "Nawaz Sharif became Prime Minister", 3);';
$con->query($sql);
$sql = 'insert into questions(question , op1 , op2, op3,op4,correctanswer)
VALUES("In which year did Pakistan win the Cricket World Cup?", "1987", "1992", "1999" , "1996", 2);';
$con->query($sql);
$sql = 'insert into questions(question , op1 , op2, op3,op4,correctanswer)
VALUES("Which is the national flower of Pakistan?", "Rose", "Thistle", "Jasmine" , "Sun flower", 3); ';
$con->query($sql);
	}
	
}
createdb();


?>