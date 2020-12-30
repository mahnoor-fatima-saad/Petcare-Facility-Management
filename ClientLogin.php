<?php
    session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Client Log In</title>
    <link rel="stylesheet" type="text/css" href="css/LoginStyles.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Login</h2>
    <form action="php/ClientAuthentication.php" method = "POST">
        <div class="inputBox">
            <input type="text" name="Username" required="">
            <label>CNIC (with dashes)</label>
        </div>
        <div class="inputBox">
            <input type="password" name="Password" required="">
            <label>Password</label>
        </div>
        <input type="submit" name="" value="Submit">
    </form>
</div>
</body>
</html>

