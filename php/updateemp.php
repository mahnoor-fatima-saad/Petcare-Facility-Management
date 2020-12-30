<?php
session_start();

    if(isset($_SESSION['eid'])) {
        $case = $_SESSION['caseid'];
    }
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $FirstName = mysqli_real_escape_string($conn,$_POST['FName']);
    $MiddleName =mysqli_real_escape_string($conn,$_POST['MName']);

    if(empty($MiddleName)){
        $MiddleName = NULL;
    }
    $LastName = mysqli_real_escape_string($conn,$_POST['LName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $add = mysqli_real_escape_string($conn,$_POST['Address']);
    $phone = mysqli_real_escape_string($conn,$_POST['num']);
    $edu = mysqli_real_escape_string($conn,$_POST['edu']);
    $qua = mysqli_real_escape_string($conn,$_POST['qua']);
    $hours = $_POST['hours'];
    $date = $_POST['date'];
    $hiredate = date("Y-m-d", strtotime($date));
    $CNIC = mysqli_query($conn, "Select CNIC from mydb.employee where `Employee ID` = '$id'");
    $row = mysqli_fetch_assoc($CNIC);
    $ans = $row['CNIC'];
    echo $ans, $hiredate;

    $query = "UPDATE mydb.user SET `First Name` = '$FirstName', `Middle Name` ='$MiddleName', `Last Name` = '$LastName',`Address` = '$add', `Phone Number`='$phone',  Email = '$email' where  CNIC = '$ans'";
    $query2 = "UPDATE mydb.employee SET `Qualification` = '$qua', Education = '$edu',`Working Hours` = $hours, `Hire Date` = '$hiredate' where `Employee ID` = $id";

    $result = mysqli_query($conn, $query2);
    if($result == false){
        echo mysqli_error($conn);
    }
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully";
        sleep(5);
        header("Location: ../ManagerPage.php");
    }

    else{
        header("Location:../Main.php");
    }
?>