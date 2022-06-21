<?php
/*
This page is to used to insert sugar reading into the table sugarreading (mySQL)
This page is deliberately left blank.
*/ 
session_start();
include "dbFunction.php";
$userID = $_SESSION['userid'];

date_default_timezone_set("Asia/Singapore");
$date = date('y-m-d'); // Retreive the current date of user's entry

//Retrieve user's readingTimes and readinglevel
$readingTimes = $_POST['meal'];
$readingLvl = $_POST['readings'];
//Write insert SQL statement to database
$sql = "INSERT INTO sugarreading(userID, readingDate, readingTimes, readingLvl) 
        VALUES ('$userID','$date', '$readingTimes',$readingLvl)";
//Execute SQL statement 
$status = mysqli_query($link, $sql) or die($mysqli_error($link));

header("location: sugarMonitoring.php");
//Close db

mysqli_close($link);
?>


