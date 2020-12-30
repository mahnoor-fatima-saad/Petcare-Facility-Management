<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Personal Information</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPersonalInfo.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Search Employee Information</h2>
    <form action="ShowPersonalInfo.php" method = "POST">
        <div class="inputBox">
            <input type="text" name="EmployeeID" required="">
            <label>Enter Employee ID</label>
        </div>
        <input type="submit" name="" value="Submit">
    </form>
</div>
</body>
</html>

