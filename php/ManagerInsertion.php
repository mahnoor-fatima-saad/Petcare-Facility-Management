<?php

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
    $years = $_POST['ManagingYears'];
    $salary = $_POST['Salary'];
    $mgmdept = $_POST['depts'];

    if ($MiddleName == " "){$MiddleName = NULL; }



    if($mgmdept == "Grooming"){
        $mgmdept = 1;
    }
    if($mgmdept == "Day Camp"){
        $mgmdept = 4;
    }
    if($mgmdept == "Exercise"){
        $mgmdept = 2;
    }
    if($mgmdept == "Hotel"){
        $mgmdept = 3;
    }
    if($mgmdept == "Veterinary"){
        $mgmdept = 5;
    }

    echo $mgmdept;

    $query = "INSERT INTO mydb.user (CNIC, `First Name`, `Middle Name`, `Last Name`, Address, `Phone Number`, Email, Password) VALUES ('$CNIC', '$FirstName', '$MiddleName', '$LastName','$add', '$phone', '$email', '$pass')";

    $query2 = "INSERT INTO mydb.manager (`Managing Years`,Salary, Education, Qualification, CNIC,`Department ID`) VALUES($years,$salary,'$edu', '$qua', '$CNIC',$mgmdept) ";
    $result = mysqli_query($conn, $query);
    if($result == false){
        echo mysqli_error($conn);
    }
    if (mysqli_query($conn, $query2)) {
        echo "New record created successfully";
        sleep(5);
        header("Location: ../ManagerPage.php");
    }
}
?>

