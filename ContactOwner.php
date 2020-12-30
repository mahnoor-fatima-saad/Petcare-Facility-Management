<?php
session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Owner Contact Information</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPetInfo.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Search for Owner</h2>
    <form action="SearchOwner.php" method = "POST">
        <div class="inputBox">
            <input type="number" name="PetID" required="">
            <label>Enter Pet ID</label>
        </div>
        <input type="submit" name="" value="Submit">
    </form>
</div>
</body>
</html>

