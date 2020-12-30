<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Pet Information</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPersonalInfo.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Search Service</h2>
    <form action="SearchPet.php" method = "POST">
        <div class="inputBox">
            <input type="text" name="PetID" required="">
            <label>Enter Pet ID</label>
        </div>
        <input type="submit" name="" value="Submit">
    </form>
</div>
</body>
</html>

