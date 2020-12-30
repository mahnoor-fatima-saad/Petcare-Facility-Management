<?php
session_start();

$ID= $_POST['Username'];
$pass = $_POST['Password'];
$_SESSION['CNIC'] = $ID;
$_SESSION['pass'] = $pass;

$host = "localhost";
$dbUsername = "Client";
$dbPassword = "";
$dbname = "mydb";

$_SESSION ['host']= $host;
$_SESSION['dbUsername'] = $dbUsername;
$_SESSION['dbPassword'] = $dbPassword;
$_SESSION['dbname'] = $dbname;

$conn = new mysqli($_SESSION['host'], $_SESSION['dbUsername'], $_SESSION['dbPassword'], $_SESSION['dbname']);
$_SESSION['conn']=$conn;
$CNIC = mysqli_query($conn, "Select CNIC from mydb.owner where `CNIC` = '$ID'");
$row = mysqli_fetch_assoc($CNIC);
$ans = $row['CNIC'];

$query2 = "SELECT Password FROM mydb.user WHERE CNIC ='$ans'";
$result2 = mysqli_query($conn,$query2);
$check = mysqli_fetch_assoc($result2);

if($check['Password'] == $pass) {
    $host = "localhost";
    $dbUsername = "Client";
    $dbPassword = "";
    $dbname = "mydb";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    $_SESSION['conn'] = $conn;
    header('Location: ../ClientPage.php');

}
else{
    header('Location: ../Main.php');
}

?>