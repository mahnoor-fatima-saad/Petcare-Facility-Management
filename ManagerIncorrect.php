<html>
<head>
    <meta charset="utf-8">
    <title>Manager Log In</title>
    <link rel="stylesheet" type="text/css" href="css/LoginStyles3.css" media="screen">
</head>
<html>
<body>
<div class="box">
    <h2>Login</h2>
    <h3>Incorrect Login. Please Try Again</h3>
    <form action="php/ManagerAuthentication.php" method="POST">
        <div class="inputBox">
            <input type="text" name="EmployeeID" required="">
            <label>Manager ID</label>
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