<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Registered Pets</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPetsInformation.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>Name </th>
            <th>Admission</th>
            <th>Discharge</th>
            <th>Notes</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "Client", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['CNIC'];
        $sql1 = "Select `Name`, Admission, Discharge, Notes from (select Admission, Discharge, Notes, `Pet ID` from mydb.`enrolled case` where `Pet ID` in (select `Pet ID` from mydb.`pet owner` where CNIC = '$id'))T1 inner join mydb.pet using (`Pet ID`);";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Name']."</th>
                            <th> ".$row['Admission']."</th>
                            <th>".$row['Discharge']."</th>
                            <th>".$row['Notes']."</th>
                     </tr>";
            }
        } else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = "box3">
    <li><a href = "ClientPage.php" >Go Back</a></a></li>
</div>
</body>
</html>


