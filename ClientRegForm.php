<?php
session_start();

$conn = new mysqli('localhost','root','','mydb');
if($conn->connect_error){
    echo "Connection Error";
}
$query = "Select `Name` from mydb.breed order by `Name`";
$result = mysqli_query($conn,$query);
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Client Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/ManagerRegFormCSS.css" media="screen">
</head>
<html>
<body>
<div class="box1">
    <h2>Client Registration</h2>
    <h3>Personal Information</h3>
    <form action = php/ClientInsertion.php method = POST>
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
    <h3>Pet Information</h3>
        <div class="inputBox">
            <input type="text" name="Petname" required="">
            <label>Pet Name</label>
        </div>
        <div class="selection">
            <select name = "Breed" required="" id = "Breed">
                <?php
                while($row=$result->fetch_assoc()){
                    $Breed = $row['Name'];
                    echo  "<option value = '$Breed'>$Breed</option>";
                }
                ?>
            </select>
        </div>
        <div class="inputBox">
            <input type="date" name="DOB"  required="">
            <label>Date of Birth</label>
        </div>
        <div class="inputBox">
            <input type="number" name="Age"  required="">
            <label>Age</label>
        </div>
        <div class="selection">
            <select name = "Gender" required="">
                <option>Female</option>
                <option>Male</option>
            </select>
        </div>
        <input type="submit" name="" value="Register">
    </form>
</div>
</body>
</html>