<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Check Total Bills</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPetsInformation.css" media="screen">
</head>
<body>
<h1>Total Bills</h1>
<div class = "box">
    <table>
        <tr>
            <th>Pet Name </th>
            <th>Total Amount</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "Client", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['CNIC'];
        $sql1 = "select `Name`, `SUM`  from (select `Case ID`, SUM(Amount)as SUM, `Pet ID` from (select `Case ID`,`Pet ID` from mydb.`enrolled case` where `Pet ID` in (select `Pet ID` from mydb.`pet owner` where CNIC = '$id')) T1
inner join mydb.bill using (`Case ID`) group by `Case ID`) T2 inner join mydb.pet using (`Pet ID`); ";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Name']."</th>
                            <th> ".$row['SUM']."</th>
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


