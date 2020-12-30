<?php
session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Employee Login</title>
    <link rel="stylesheet" type="text/css" href="css/LoginStyles2.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Login</h2>
    <h3>Incorrect Login. Please Try Again</h3>
    <form action="php/EmployeeAuthentication.php" >
        <div class="inputBox">
            <input type="text" name="" required="">
            <label>Username</label>
        </div>
        <div class="inputBox">
            <input type="password" name="" required="">
            <label>Password</label>
        </div>
        <input type="submit" name="" value="Submit">
    </form>
</div>
</body>
</html>