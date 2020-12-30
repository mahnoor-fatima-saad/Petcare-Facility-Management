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

else {
    $EID = $_SESSION['ID'];
    $PID = $_SESSION['pid'];
    $Adate = $_POST['AdmissionDate'];
    $AdmissionDate = date("Y-m-d", strtotime($Adate));
    $Ddate = $_POST['DischargeDate'];
    $DischargeDate = date("Y-m-d", strtotime($Ddate));
    $Notes = mysqli_escape_string($conn, $_POST['Notes']);
    $service = $_POST['Service'];
    $type = $_POST['StatusType'];
    $status = $_POST['status'];
    $_SESSION['status'] = $status;
    $checked_time = date('Y-m-d h:i A ' , strtotime($_POST['CheckedTime']));

    if($DischargeDate == '1970-01-01'){
        $DischargeDate = '0000-00-00';
    }

    // for enrolled case table
    $query = "INSERT INTO mydb.`enrolled case` (Admission, Discharge, Notes, `Employee ID`, `Pet ID`) VALUES ('$AdmissionDate', '$DischargeDate', '$Notes', $EID, $PID)";
    $result = mysqli_query($conn, $query);
    if($result == false){
        echo mysqli_connect_error($conn);
    }

    $caseID = mysqli_insert_id($conn);
    $_SESSION['CaseID'] = $caseID;

    //for service provided table
    $serviceID = mysqli_query($conn, "Select `Service ID` from mydb.service where `Service Name` = '$service'");
    $getService = mysqli_fetch_assoc($serviceID);
    $finalServiceID = $getService['Service ID'];
    $_SESSION['ServiceID'] = $finalServiceID;

    $query2 = "INSERT INTO mydb.`service provided` (`Case ID`, `Service ID`) VALUES ('$caseID', '$finalServiceID')";
    $result2 = mysqli_query($conn, $query2);
    if($result2 == false){
        echo mysqli_connect_error($conn);
    }

    //For current status table
    $statusType = mysqli_query($conn, "Select `Type ID` from mydb.`status type` where `Type` = '$type';");
    $getStatus = mysqli_fetch_assoc($statusType);
    $finalTypeID = $getStatus['Type ID'];


    $query3 = "INSERT INTO mydb.`current status` (`Status`, `Type ID`) VALUES ('$status', '$finalTypeID')";
    $result3 = mysqli_query($conn, $query3);
    if($result3 == false){
        echo mysqli_connect_error($conn);
    }
    $StatusID = mysqli_insert_id($conn);

    //for case status table
    $query4 = "INSERT INTO mydb.`case status`(`Case ID`, `Status ID`,`Type ID`, `Checked Time`) VALUES ('$caseID','$StatusID', '$finalTypeID','$checked_time')";
    $result4 = mysqli_query($conn, $query4);
    if($result4 == false){
        echo mysqli_connect_error($conn);
    }

    header("Location: ../EmployeePage.php");
}
?>
