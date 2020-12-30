<?php
    session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Case Information</title>
    <link rel="stylesheet" type="text/css" href="css/ViewPetInfo.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Search Case</h2>
    <form action="SearchCase.php" method = "POST">
        <div class="inputBox">
            <input type="number" name="CaseID" required="">
            <label>Enter Case ID</label>
        </div>
        <input type="submit" name="" value="Submit">
    </form>
</div>
</body>
</html>

