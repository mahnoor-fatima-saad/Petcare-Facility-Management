<?php
session_start();

    if(isset($_SESSION)){
        $caseID = $_SESSION['caseid'];
        $conn = mysqli_connect("localhost", "Employee", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

$status = mysqli_real_escape_string($conn,$_POST['status']);
$type =$_POST['StatusType'];
$time = $_POST['CheckedTime'];
$CheckedTime = date('Y-m-d h:i A ' , strtotime($time));



$statusType = mysqli_query($conn, "Select `Type ID` from mydb.`status type` where `Type` = '$type';");
$getStatus = mysqli_fetch_assoc($statusType);
$finalTypeID = $getStatus['Type ID'];
echo $status, $type, $time,$CheckedTime, $finalTypeID;

$query3 = "INSERT INTO mydb.`current status` (`Status`, `Type ID`) VALUES ('$status', '$finalTypeID')";
$result3 = mysqli_query($conn, $query3);
if($result3 == false){
    echo mysqli_connect_error($conn);
}
$StatusID = mysqli_insert_id($conn);

$query4 = "INSERT INTO mydb.`case status`(`Case ID`, `Status ID`,`Type ID`, `Checked Time`) VALUES ('$caseID','$StatusID', '$finalTypeID','$CheckedTime')";
$result4 = mysqli_query($conn, $query4);
if($result4 == false){
    echo mysqli_connect_error($conn);
}

header("Location: ../EmployeePage.php");

?>