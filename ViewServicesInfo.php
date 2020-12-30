<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Services Information</title>
    <link rel="stylesheet" type="text/css" href="css/SearchPet.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>Service </th>
            <th>Enrolled </th>
            <th>Capacity</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "Employee", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql1 = "select `Service Name`, num, Capacity from (select `Service ID`, count(`Service ID`) as num from (select `Case ID` 
from mydb.`enrolled case` where Discharge = '0000-00-00') T1  inner join mydb.`service provided` using (`Case ID`)  group by `Service ID`) T2 inner join mydb.service using (`Service ID`);  ";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Service Name']."</th>
                            <th> ".$row['num']."</th>
                            <th>".$row['Capacity']."</th>
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


