<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Client Search Result</title>
    <link rel="stylesheet" type="text/css" href="css/SearchEmployee.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>First Name </th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
        </tr>
        <?php
        $id = $_POST['PetID'];
        $_SESSION['pid'] = $id;
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql1 = "Select `First Name`, `Last Name`, Address, `Phone Number`, Email from (select * from mydb.`pet owner` where `Pet ID` = $id) T1 inner join mydb.user using (CNIC); " ;
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['First Name']."</th>
                            <th> ".$row['Last Name']."</th>
                            <th>".$row['Address']."</th>
                            <th>".$row['Phone Number']."</th>
                            <th>".$row['Email']."</th>
                     </tr>";
            }
        } else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = "box2">
    <table>
        <tr>
            <th>Service Name </th>
            <th>Admission</th>
            <th>Discharge</th>
            <th>Employee Incharge</th>
        </tr>
        <?php
        $id = $_POST['PetID'];
        $_SESSION['pid'] = $id;
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql2 = "select `Service Name`, Admission, Discharge, `Employee ID` from (SELECT * FROM mydb.`enrolled case` inner join mydb.`service provided` using (`Case ID`) where `Pet ID` = $id) T2 inner join mydb.service using (`Service ID`);";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Service Name']."</th>
                            <th> ".$row['Admission']."</th>
                            <th>".$row['Discharge']."</th>
                            <th>".$row['Employee ID']."</th>
                     </tr>";
            }
        } else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = "box3">
    <li><a href = "ManagerPage.php" >Go Back</a></a></li>
</div>
</body>
</html>


