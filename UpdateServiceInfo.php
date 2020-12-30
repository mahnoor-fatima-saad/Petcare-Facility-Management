<?php
session_start();

if(isset($_SESSION)){
    $case = $_SESSION['caseid'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Service Update</title>
    <link rel="stylesheet" type="text/css" href="css/SearchPet.css" media="screen">
</head>
<body>
<h1>UPDATE SERVICE INFORMATION</h1>
<h2>Enter Start and End Time in the Form Below</h2>
<table>
    <tr>
        <th>Start Time </th>
        <th>End Time</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "Select `Start Time`, `End Time` FROM mydb.`service provided` where `Case ID` = '$case' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            echo "<tr><form action = php/updateservice.php method = POST>";
            echo "<th><input type = datetime-local name = start value ='".$row['Start Time']."'</th>";
            echo "<th><input type = datetime-local name = end value ='".$row['End Time']."'</th> ";
            echo"<th><input type = submit name = Enter value = Enter></th>";
            echo "</form> </tr>";
        }
    }
    ?>
</table>

</body>
</html>