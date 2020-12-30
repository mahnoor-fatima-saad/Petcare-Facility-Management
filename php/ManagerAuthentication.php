<?php
session_start();

$ID= $_POST['EmployeeID'];
$pass = $_POST['Password'];
$_SESSION['ID'] = $ID;
$_SESSION['pass'] = $pass;

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "mydb";

$_SESSION ['host']= $host;
$_SESSION['dbUsername'] = $dbUsername;
$_SESSION['dbPassword'] = $dbPassword;
$_SESSION['dbname'] = $dbname;

$conn = new mysqli($_SESSION['host'], $_SESSION['dbUsername'], $_SESSION['dbPassword'], $_SESSION['dbname']);
$_SESSION['conn']=$conn;
$query = "SELECT CNIC FROM mydb.manager WHERE `Manager ID` = $ID";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)<=0){
    header('Location: ../ManagerIncorrect.php');
}

else{
    echo "here";
    $query2 = "SELECT Password FROM mydb.user WHERE CNIC in (SELECT `CNIC` FROM mydb.manager WHERE `Manager ID` = $ID)";
    $result2 = mysqli_query($conn,$query2);
    $check = mysqli_fetch_assoc($result2);

    if($check['Password'] == $pass) {
        $host = "localhost";
        $dbUsername = "manager";
        $dbPassword = "";
        $dbname = "mydb";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        header('Location: ../ManagerPage.php');

    }
    else{
        header('Location: ../ManagerIncorrect.php');
    }
}
?>