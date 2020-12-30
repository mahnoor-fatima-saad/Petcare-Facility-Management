<?php
    session_start();
    if(isset($_SESSION['eid'])){
        $id = $_SESSION['eid'];
    }
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "mydb";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if($conn->connect_error){
        echo "CONNECTION ERROR!";
        sleep(5);
        header("Location: ../Main.php");
    }
    $CNIC = mysqli_query($conn, "Select CNIC from mydb.employee where `Employee ID` = $id");
    $row = mysqli_fetch_assoc($CNIC);
    $ans = $row['CNIC'];
    $query = "Delete FROM mydb.user WHERE CNIC = '$ans'";

    $result = mysqli_query($conn, $query);
    if($result==false){
        echo mysqli_error($conn);
    }
    else{
        echo "Record Deleted!";
        sleep(3);
        header("Location: ../ManagerPage.php");
    }

    ?>

