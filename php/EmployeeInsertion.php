<?php
     session_start();

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "mydb";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

    if($conn->connect_error){
        echo "Connection Error";
        header("Location: ../Main.php");
    }

    else{
    $CNIC = mysqli_real_escape_string($conn, $_POST['CNIC']);
    $FirstName = mysqli_real_escape_string($conn,$_POST['FName']);
    $MiddleName =mysqli_real_escape_string($conn,$_POST['MName']);
    $LastName = mysqli_real_escape_string($conn,$_POST['LName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $add = mysqli_real_escape_string($conn,$_POST['Address']);
    $phone = mysqli_real_escape_string($conn,$_POST['ContactNo']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $edu = mysqli_real_escape_string($conn,$_POST['Education']);
    $qua = mysqli_real_escape_string($conn,$_POST['Qualification']);
    $work = $_POST['WorkingHours'];
    $date = $_POST['HireDate'];
    $hiredate = date("Y-m-d", strtotime($date));


    if ($MiddleName == " "){$MiddleName = NULL; }
    $query = "INSERT INTO mydb.user (CNIC, `First Name`, `Middle Name`, `Last Name`, Address, `Phone Number`, Email, Password) VALUES ('$CNIC', '$FirstName', '$MiddleName', '$LastName','$add', '$phone', '$email', '$pass')";
    $query2 = "INSERT INTO mydb.employee (Education, Qualification, `Hire Date`, `Working Hours`, CNIC) VALUES('$edu', '$qua', '$hiredate', $work, '$CNIC') ";
        $result = mysqli_query($conn, $query);
            if (mysqli_query($conn, $query2)) {
                echo "New record created successfully";
                sleep(5);
                header("Location: ../ManagerPage.php");
            }
        }
?>
