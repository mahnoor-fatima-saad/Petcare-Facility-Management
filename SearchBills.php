<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Billing Result</title>
    <link rel="stylesheet" type="text/css" href="css/SearchEmployee.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>Bill ID </th>
            <th>Time Stamp</th>
            <th>Amount</th>
            <th>Case ID</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "Employee", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $date = $_POST['date'];
        $datef = date('Y-m-d' , strtotime($date));
        $query1 = " select * from mydb.bill where `Time Stamp` > '$datef';";
        $result = $conn->query($query1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['ID']."</th>
                            <th> ".$row['Time Stamp']."</th>
                            <th>".$row['Amount']."</th>
                            <th>".$row['Case ID']."</th>
 
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


