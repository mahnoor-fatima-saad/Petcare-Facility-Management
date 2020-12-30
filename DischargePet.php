<?php
session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Discharge Pet</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPetInfo.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Search Case</h2>
    <form action="php/Discharge.php" method = "POST">
        <div class="inputBox">
            <input type="date" name="Discharge" required="">
            <label>Enter Discharge Date</label>
        </div>
        <input type="submit" name="" value="Enter">
    </form>
</div>
</body>
</html>

