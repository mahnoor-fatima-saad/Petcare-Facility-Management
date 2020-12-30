<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Personal Information</title>
    <link rel="stylesheet" type="text/css" href="css/ShowPersonalInfo.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>CNIC</th>
            <th>First Name </th>
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
        $id = $_POST['EmployeeID'];
        $_SESSION['eid'] = $id;
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "Select distinct CNIC,`First Name`, `Last Name`, Address, `Phone Number`, Email, `Hire Date`, `Working Hours`, Education, Qualification from (Select * from mydb.user inner join mydb.employee using (CNIC)) T1 left outer join mydb.`enrolled case` using (`Employee ID`) where `Employee ID` = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['CNIC']."</th>
                            <th>".$row['First Name']."</th>
                            <th> ".$row['Last Name']."</th>
                            <th>".$row['Address']."</th>
                            <th>".$row['Phone Number']."</th>
                            <th>".$row['Email']."</th>
                            <th>".$row['Hire Date']."</th>
                            <th>".$row['Working Hours']."</th>
                            <th>".$row['Education']."</th>
                            <th>" . $row["Qualification"] . "</th>
                     </tr>";
            }
        } else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = box2>
    <table>
        <tr>
            <th>Case ID</th>
            <th>Pet Name</th>
            <th>Owner CNIC</th>
            <th>Admission</th>
            <th>Discharge</th>
            <th>Notes</th>
        </tr>
        <?php
        $id = $_POST['EmployeeID'];
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "select `Case ID`, `Name`, CNIC, Admission, Discharge, Notes from (Select * from (Select * from mydb.`enrolled case` where `Employee ID` = $id) T1 inner join mydb.pet using (`Pet ID`)) T2 inner join mydb.`pet owner` using (`Pet ID`) ; ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Case ID']."</th>
                            <th> ".$row['Name']."</th>
                            <th>".$row['CNIC']."</th>
                            <th>".$row['Admission']."</th>
                            <th>".$row['Discharge']."</th>
                            <th>".$row['Notes']."</th>
                     </tr>";
            }
        }
        else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = "box3">
    <li><a href = "EmployeePage.php" >Go Back</a></a></li>
</div>
</body>
</html>


