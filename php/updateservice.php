<?php
session_start();

if(isset($_SESSION['caseid'])) {
    $id = $_SESSION['caseid'];
}
$conn = mysqli_connect("localhost", "Employee", "", "mydb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$start = $_POST['start'];
$starttime = date('Y-m-d h:i A ' , strtotime($start));
$end = $_POST['end'];
$endtime = date('Y-m-d h:i A ' , strtotime($end));

$query = "UPDATE mydb.`service provided` SET `Start Time` = '$starttime', `End Time` ='$endtime' where `Case ID` = $id";
$result = mysqli_query($conn, $query);
if($result == false){
    echo mysqli_error($conn);
}
header("Location: ../EmployeePage.php");

?>