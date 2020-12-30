<?php
session_start();

$conn = new mysqli('localhost','root','','mydb');
if($conn->connect_error){
    echo "Connection Error";
}
$query = "SELECT `Service Name` from mydb.service order by `Service Name`; ";
$result = mysqli_query($conn,$query);

$query2 = "SELECT `Type` FROM mydb.`status type`; ";
$result2 = mysqli_query($conn,$query2);

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Pet Enrollment Form</title>
    <link rel="stylesheet" type="text/css" href="css/EnrollAPet.css" media="screen">
</head>
<html>
<body>
<div class="box1">
    <h2>Enrollment Form</h2>
    <form action="php/PetEnrolling.php" method="POST">
        <div class="inputBox">
            <input type="date" name="AdmissionDate" >
            <label>Admission Date</label>
        </div>
        <div class="inputBox">
            <input type="date" name="DischargeDate" >
            <label>Discharge Date</label>
        </div>
        <div class="inputBox">
            <input type="text" name="Notes" >
            <label>Notes</label>
        </div>
        <div class="selection">
            <select name = "Service" required="" id = "Service" >
                <option>Select Service</option>
                <?php
                while($row=$result->fetch_assoc()){
                    $Service = $row['Service Name'];
                    echo  "<option value = '$Service'>$Service</option>";
                }
                ?>
            </select>
        </div>
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
    <input type="submit" name="" value="Enroll">
    </form>
</div>
</body>
</html>