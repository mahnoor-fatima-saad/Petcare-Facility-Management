<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Owner Search Result</title>
    <link rel="stylesheet" type="text/css" href="css/SearchPet.css" media="screen">
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
        $conn = mysqli_connect("localhost", "Employee", "", "mydb");
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
<div class = "box3">
    <li><a href = "EmployeePage.php" >Go Back</a></a></li>
</div>
</body>
</html>


