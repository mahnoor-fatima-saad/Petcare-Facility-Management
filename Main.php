<html>
<head>
    <meta charset="utf-8">
    <title>Pet Care Facility</title>
    <!-- Icon -->
    <link rel = "icon" href ="pics/icon.png"  type = "image/x-icon">
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css" >
    <!-- JavaScript -->
    <script  language="javascript" type="text/javascript">

        function openClient(){
            window.location.href ="ClientLogin.php";
        }
        function openEmployee(){
            window.location.href ="EmployeeLogin.php";
        }
        function openManager(){
            window.location.href ="Manager.php";
        }
    </script>
</head>
<body>
<div class = "Welcome">
    <div class="inner" >
        <h1 class="display-1">Welcome</h1>
        <p1 class="display-4">To The Pet Care Management System</p1>
        <p2 class="display-4">Pick Your Identity</p2>
    </div>
</div>
<div class = "links">
    <div class="container" >
        <div class="row justify-content-center" >

            <!-- Client -->
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <div class="inner">
                        <img src="pics/Pup2bg.jpg" class="card-img-top" alt="...">
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">Client</h5>
                        <p class="card-text">Avail our services for your pets. We provide 100% satisfaction level to our customers. We offer various services which you can browse through after logging in.</p>
                        <input type="button" value="Client" onClick="openClient();" class="ClientButton">
                    </div>
                </div>
            </div>

            <!-- Employee -->
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <div class="inner">
                        <img src="pics/Kittenbg.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Employee</h5>
                        <p class="card-text">Our employees are required to sign-in from here to start working. Thank you! Please provide your full credentials for verification purposes.</p>
                        <input type="button" value="Employee" onClick="openEmployee();" class = "center-align EmployeeButton ">
                    </div>
                </div>
            </div>

            <!-- Manager -->
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <div class="inner">
                        <img src= "pics/MacawBG.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Manager</h5>
                        <p class="card-text">The CEO and Co-founders, please login from here to access all the records, services, and clients' information, or to make any changes to the system!</p>
                        <input type="button" value="Manager" onClick="openManager();" class =" ManagerButton">
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>