<?php
    session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "mydb";

$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Update</title>
    <link rel="stylesheet" type="text/css" href="css/UpdateEmployeeRecord.css" media="screen">
</head>
<body>
<h1>UPDATE EMPLOYEE INFORMATION</h1>
<h2>Enter Updated Information in the Form Below</h2>
    <table>
        <tr>
            <th>First Name </th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Number</th>
            <th>Email</th>
            <th>Hiring Date</th>
            <th>Hours/Week</th>
            <th>Education</th>
            <th>Qualification</th>
        </tr>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['eid'];
        $sql = "Select  distinct `First Name`, `Middle Name`, `Last Name`, Address, `Phone Number`, Email, `Hire Date`, `Working Hours`, Education, Qualification 
from (Select * from mydb.user inner join mydb.employee using (CNIC)) T1 left outer join mydb.`enrolled case` 
using (`Employee ID`) where `Employee ID` = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                echo "<tr><form action = php/updateemp.php method = POST>";
                echo "<th><input type = text name = FName value ='".$row['First Name']."'</th>";
                echo "<th><input type = text name = MName value ='".$row['Middle Name']."'</th> ";
                echo "<th><input type = text name = LName value ='".$row['Last Name']."'</th>";
                echo "<th><input type = text name = Address value ='".$row['Address']."'</th>";
                echo" <th><input type = text name = num value ='".$row['Phone Number']."'</th>";
                echo "<th><input type = text name = email value ='".$row['Email']."'</th>";
                echo"<th><input type = date name = date value ='".$row['Hire Date']."'</th>";
                echo "<th><input type = number name = hours value ='".$row['Working Hours']."'</th>";
                echo "<th><input type = text name = edu value ='".$row['Education']."'</th>";
                echo "<th><input type = text name = qua value ='".$row['Qualification']."'</th>";
                echo"<th><input type = submit name = Enter value = Enter></th>";
                echo "</form> </tr>";
            }
        }
        ?>
    </table>

</body>
</html>