<?php
session_start();

$host = "localhost";
$dbUsername = "Employee";
$dbPassword = "";
$dbname = "mydb";

$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

if($conn->connect_error){
    echo "Connection Error";
    header("Location: ../Main.php");
}

if (isset($_SESSION)){
    $case = $_SESSION['caseid'];
}

$Discharge = $_POST['Discharge'];
$Ddate= date("Y-m-d", strtotime($Discharge));


$query = "UPDATE mydb.`enrolled case` SET Discharge = '$Ddate' where `Case ID` = '$case'";
$run = mysqli_query($conn, $query);

header("Location: ../EmployeePage.php");


?>