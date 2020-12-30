<html>
<head>
    <meta charset="utf-8">
    <title>Manager Log In</title>
    <link rel="stylesheet" type="text/css" href="css/LoginStyles3.css" media="screen">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css" >
    <link rel = "icon" href ="pics/icon.png"  type = "image/x-icon">
</head>
<html>
<body>
<div class="box">
    <div class="inner">
        <h2 class="display-4">Login</h2>
    </div>
    <form action="php/ManagerAuthentication.php" method="POST">
        <div class="inputBox">
            <input type="text" name="EmployeeID" required="">
            <label>Manager ID</label>
        </div>
        <div class="inputBox">
            <input type="password" name="Password" required="">
            <label>Password</label>
        </div>
        <div class="btn btn-group-lg text-center inner" style="text-align:center;">
            <input type="submit" name="" value="Submit" class="btn btn-outline-primary">
        </div>
    </form>
</div>
</body>
</html>