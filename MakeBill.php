<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bill</title>
    <link rel="stylesheet" type="text/css" href="css/SearchPet.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>Case ID </th>
            <th>Service</th>
            <th>Unit Cost</th>
            <th>Amount</th>
            <th>Time Stamp</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "Employee", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['caseid'];
        $query1 = mysqli_query($conn, " select Amount, `Time Stamp` from mydb.bill where `Case ID` = '$id';");
        $result1 = mysqli_fetch_assoc($query1);
        $TimeStamp = $result1['Time Stamp'];
        $Amount = $result1['Amount'];


        $sql1 = "select `Cost Per Unit`,`Service Name`,`Case ID` from (select `Service ID`,`Case ID` from mydb.`service provided` where `Case ID` = '$id')T1 inner join mydb.service using (`Service ID`) ;  ";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Case ID']."</th>
                            <th> ".$row['Service Name']."</th>
                            <th>".$row['Cost Per Unit']."</th>
                            <th>".$Amount."</th>
                            <th>".$TimeStamp."</th>
 
                     </tr>";
            }
        } else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = "box3">
    <li><a href = "EmployeePage.php" >Go Back</a></a></li>
</div>
</body>
</html>


