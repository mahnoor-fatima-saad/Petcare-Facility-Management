<?php


$conn = new mysqli('localhost','root','','mydb');
if($conn->connect_error){
    echo "Connection Error";
}

$query = "SELECT `Name` FROM mydb.department where `Department ID` not in (select `Department ID` from mydb.manager)order by `Name`";
$result = mysqli_query($conn,$query);
?>


<html>
<head>
    <meta charset="utf-8">
    <title>Manager Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/ManagerRegFormCSS.css" media="screen">
</head>
<html>
<body>
<div class="box1">
    <h2>Manager Registration</h2>
    <h3>Personal Information</h3>
    <form action="php/ManagerInsertion.php" method="POST">
        <div class="inputBox">
            <input type="text" name="CNIC"  pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}"  required = "" >
            <label>CNIC </label>
        </div>
        <div class="inputBox">
            <input type="text" name="FName" required="">
            <label>First Name</label>
        </div>
        <div class="inputBox">
            <input type="text" name="MName" required>
            <label>Middle Name</label>
        </div>
        <div class="inputBox">
            <input type="text" name="LName" required = "">
            <label>Last Name</label>
        </div>
        <div class="inputBox">
            <input type="email" name="email" required="">
            <label>E-Mail Address</label>
        </div>
        <div class="inputBox">
            <input type="text" name="Address" required="">
            <label>Home Address</label>
        </div>
        <div class="inputBox">
            <input type="tel" name="ContactNo"  pattern="[0-9]{4}[0-9]{7}" required = "">
            <label>Contact Number</label>
        </div>
        <div class="inputBox">
            <input type="text" name="password"  required = "">
            <label>Password</label>
        </div>

</div>
<div class ="box2">
    <h3>Professional Information</h3>
        <div class="inputBox">
            <input type="text" name="Education" required="">
            <label>Education</label>
        </div>
        <div class="inputBox">
            <input type="text" name="Qualification" required="">
            <label>Qualification</label>
        </div>
        <div class ="inputBox">
            <input type="number" name = "ManagingYears" min = "0" max="20" required="">
            <label>Managing Years</label>
        </div>
        <div class="inputBox">
            <input type="number" name="Salary" min= "0" max="99999999" step=".01" required="">
            <label>Salary</label>
        </div>
        <div class="selection">
            <select name = "depts" required="">
                <?php
                while($row=$result->fetch_assoc()){
                    $dept_name = $row['Name'];
                    echo  "<option value = '$dept_name'>$dept_name</option>";
                }
                ?>
            </select>
        </div>
        <input type="submit" name="" value="Register">
    </form>
</div>
</body>
</html>