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

else {
    $CNIC = mysqli_real_escape_string($conn, $_POST['CNIC']);
    $FirstName = mysqli_real_escape_string($conn, $_POST['FName']);
    $MiddleName = mysqli_real_escape_string($conn, $_POST['MName']);
    $LastName = mysqli_real_escape_string($conn, $_POST['LName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $add = mysqli_real_escape_string($conn, $_POST['Address']);
    $phone = mysqli_real_escape_string($conn, $_POST['ContactNo']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $petName = mysqli_real_escape_string($conn, $_POST['Petname']);
    $Age = $_POST['Age'];
    $Breed = $_POST['Breed'];
    $date = $_POST['DOB'];
    $DOB = date("Y-m-d", strtotime($date));
    $Gender = $_POST['Gender'];


    if (empty($MiddleName)) {
        $MiddleName = NULL;
    }

    $query = "SELECT `Breed ID`, `Species ID` FROM mydb.breed where `Name` = '$Breed' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $breedid = $row['Breed ID'];
    $speciesid = $row['Species ID'];


    $query = "INSERT INTO mydb.user (CNIC, `First Name`, `Middle Name`, `Last Name`, Address, `Phone Number`, Email, Password) VALUES ('$CNIC', '$FirstName', '$MiddleName', '$LastName','$add', '$phone', '$email', '$pass')";
    $result = mysqli_query($conn, $query);
    if ($result == false) {
        echo mysqli_error($conn);
    }
    $query4 = "INSERT INTO mydb.owner (CNIC) VALUES ('$CNIC')";
    $result4 = mysqli_query($conn,$query4);
    if($result4==false){
        echo mysqli_error($conn);
    }
    $query2 = "INSERT INTO mydb.pet (`Name`, Gender, `Date of Birth`, Age, `Breed ID`, `Species ID`) VALUES('$petName', '$Gender', '$DOB', $Age,$breedid, $speciesid) ";
    $result2 = mysqli_query($conn, $query2);
    if ($result2 == false) {
        echo mysqli_error($conn);
    }
    $last_pet_id = mysqli_insert_id($conn);
    $query3 = "INSERT INTO mydb.`pet owner`(`Pet Id`,  CNIC) VALUES ('$last_pet_id', '$CNIC'); ";
    $result3 = mysqli_query($conn, $query3);
    if ($result3 == false){
        echo mysqli_error($conn);
    }
    header("Location: ../EmployeePage.php");

}
?>
