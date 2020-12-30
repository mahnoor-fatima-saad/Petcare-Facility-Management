<?php
session_start();

if(isset($_SESSION)){
    $case = $_SESSION['caseid'];
    $conn = mysqli_connect("localhost", "Employee", "", "mydb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
$query2 = "SELECT `Type` FROM mydb.`status type`; ";
$result2 = mysqli_query($conn,$query2);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Status</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPersonalInfo.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Update Status Form</h2>
    <form action="php/updatestatus.php" method="POST">
    <div class = "inputBox">
        <input type = "text" name = "status">
        <label>Current Status</label>
    </div>
    <div class="selection">
        <select name = "StatusType" required="" id = "StatusType" >
            <option>Select Type of Status</option>
            <?php
            while($row=$result2->fetch_assoc()){
                $Status = $row['Type'];
                echo  "<option value = '$Status'>$Status</option>";
            }
            ?>
        </select>
    </div>
    <div class = inputBox>
        <input type="datetime-local"   name="CheckedTime" >
        <label>Status Check Time</label>
    </div>
        <input type="submit" name="" value="Submit">
    </form>
</div>
</body>
</html>

