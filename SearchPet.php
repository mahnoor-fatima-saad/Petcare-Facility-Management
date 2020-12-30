<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pet Search Result</title>
    <link rel="stylesheet" type="text/css" href="css/SearchPet.css" media="screen">
</head>
<body>
<h1>Search Results</h1>
<div class = "box">
    <table>
        <tr>
            <th>Pet ID </th>
            <th>Pet Name</th>
            <th>Species</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Owner CNIC</th>

        </tr>
        <?php
        $id = $_POST['PetID'];
        $_SESSION['pid'] = $id;
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql1 = "Select `Pet ID`, `Name`, Age, Gender, CNIC from mydb.pet inner join mydb.`pet owner` using (`Pet ID`) where `Pet ID`= $id;" ;
        $breed = "Select `Name` from mydb.breed where `Breed ID`= (Select `Breed ID` from mydb.pet inner join mydb.`pet owner` using (`Pet ID`) where `Pet ID`= $id);";
        $breedrun = mysqli_query($conn, $breed);
        $br = mysqli_fetch_assoc($breedrun);
        $br2 = $br['Name'];

        $Species = "Select `Name`from mydb.species where `Species ID`= (Select `Species ID` from mydb.pet inner join mydb.`pet owner` using (`Pet ID`) where `Pet ID`= $id); ";
        $Speciesrun = mysqli_query($conn, $Species);
        $sp = mysqli_fetch_assoc($Speciesrun);
        $sp2 = $sp['Name'];
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['Pet ID']."</th>
                            <th> ".$row['Name']."</th>
                            <th>".$sp2."</th>
                            <th>".$br2."</th>
                            <th>".$row['Age']."</th>
                            <th>".$row['Gender']."</th>
                            <th>".$row['CNIC']."</th>
                     </tr>";
            }
        } else { echo "0 results"; }
        ?>
    </table>
</div>
<div class = "box3">
    <li><a href="EnrollAPet.php">Enroll for Service</a></li>
    <li><a href = "EmployeePage.php" >Go Back</a></a></li>
</div>
</body>
</html>


