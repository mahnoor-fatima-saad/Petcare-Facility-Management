<?php
session_start();

$id = $_SESSION['caseid'];

$conn = mysqli_connect("localhost", "Employee", "", "mydb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query1 =" select Admission, Discharge from mydb.`enrolled case` where `Case ID` = '$id'; ";
$result1 = mysqli_query($conn, $query1);
$result = mysqli_fetch_assoc($result1);
$r1 = $result['Discharge'];
$r2 = $result['Admission'];
$discharge = date_create("$r1");
$admit = date_create("$r2");
$datediff = date_diff($discharge, $admit);
$days = $datediff->format('%d');
$time = date("Y-m-d H:i");



$query2 = "select `Cost Per Unit`,`Service Name` from (select `Service ID` from mydb.`service provided` where `Case ID` = 1)T1 inner join mydb.service using (`Service ID`) ; ";
$result2 = mysqli_query($conn, $query2);
$resultf = mysqli_fetch_assoc($result2);
$costperunit = $resultf['Cost Per Unit'];
$_SESSION['ServiceName'] = $resultf['Service Name'];
$total = $days * $costperunit;

echo "DATE: " ,$days;
echo "Amount:  ", $total;
echo "Time:  ". $time;

$insert = "INSERT INTO mydb.bill (`Time Stamp`, Amount, `Case ID`) VALUES ('$time', '$total', '$id')";
$run = mysqli_query($conn, $insert);

header("Location: ../MakeBill.php");

?>

