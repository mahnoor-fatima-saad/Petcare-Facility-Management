<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Case Search Result</title>
    <link rel="stylesheet" type="text/css" href="css/SearchPet.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>Case ID </th>
            <th>Pet ID</th>
            <th>Service</th>
            <th>Department</th>
            <th>Admission Date</th>
            <th>Discharge Date</th>
            <th>Service Start</th>
            <th>Service End</th>
        </tr>
        <?php
        $id = $_POST['CaseID'];
        $_SESSION['caseid'] = $id;
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql1 = "select `Case ID`, `Pet ID`, `Service Name`,`Name`, `Admission`, `Discharge`,`Start Time`,`End Time` from (select * from 
                    (select * from (Select * from mydb.`enrolled case` where `Case ID` = $id)T1
                     inner join mydb.`service provided` using(`Case ID`)) T2
                     inner join mydb.`service` using (`Service ID`)) T3
                     inner join mydb.department using (`Department ID`);";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Case ID']."</th>
                            <th> ".$row['Pet ID']."</th>
                            <th>".$row['Service Name']."</th>
                            <th>".$row['Name']."</th>
                            <th>".$row['Admission']."</th>
                            <th>".$row['Discharge']."</th>
                             <th>".$row['Start Time']."</th>
                            <th>".$row['End Time']."</th>
                     </tr>";
            }
        } else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = box2>
    <table>
        <tr>
            <th>Status</th>
            <th>Type</th>
            <th>Checked Time</th>
        </tr>
        <?php
        $id = $_POST['CaseID'];
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql ="select `Status`, `Type`, `Checked Time` from (select * from ((select `Status ID`, `Checked Time` from mydb.`case status` where `Case ID` = $id) T1 inner join mydb.`current status` using (`Status ID`))) T2
inner join mydb.`status type` using (`Type ID`); ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Status']."</th>
                            <th> ".$row['Type']."</th>
                            <th>".$row['Checked Time']."</th>
                     </tr>";
            }
        }
        else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = "box3">
    <li><a href="UpdateStatusInfo.php">Update Status</a></li>
    <li><a href = "UpdateServiceInfo.php">Service Log</a></li>
    <li><a href = "DischargePet.php" >Discharge</a></li>
    <li><a href="php/GenerateBill.php">Generate Bill</a> </li>
    <li><a href = "EmployeePage.php">Go Back</a></li>
</div>
</body>
</html>


