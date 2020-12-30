<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Search Result</title>
    <link rel="stylesheet" type="text/css" href="css/ViewDepartmentInfo.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>Service Name </th>
            <th>Department</th>
            <th>Cost</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql1 = "Select `Service Name`, `Name`, `Cost Per Unit` from mydb.service inner join mydb.department using (`Department ID`); ";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Service Name']."</th>
                            <th> ".$row['Name']."</th>
                            <th>".$row['Cost Per Unit']."</th>
 
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


