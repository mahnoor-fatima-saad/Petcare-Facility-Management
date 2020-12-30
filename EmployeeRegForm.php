<html>
<head>
    <meta charset="utf-8">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/EmployeeRegFormCSS.css" media="screen">
</head>
<html>
<body>
<div class="box1">
    <h2>Employee Registration</h2>
    <h3>Personal Information</h3>
    <form action="php/EmployeeInsertion.php" method="POST">
        <div class="inputBox">
            <input type="text" name="CNIC"  pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}"  required = "" >
            <label>CNIC</label>
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
        <div class="inputBox">
            <input type="date" name="HireDate"  required="">
            <label>Hire Date</label>
        </div>
        <div class="inputBox">
            <input type="number" name="WorkingHours" required="">
            <label>Working Hours</label>
        </div>
        <input type="submit" name="" value="Register">
    </form>
</div>
</body>
</html>