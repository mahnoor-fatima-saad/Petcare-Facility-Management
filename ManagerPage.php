<?php
    session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Manager Page</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/ManagerPageNav.css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Icon -->
    <link rel = "icon" href ="pics/icon.png"  type = "image/x-icon">
    <!-- Jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Jquery function -->
    <script>
        $( function() {
            $( document ).tooltip();
        } );
    </script>

    <style>
        label {
            font-family: Arial;
            display: inline-block;
            width: 40%;
        }
    </style>
</head>


<body>
<div class = "navback">
    <ul class = "topnavback">
        <div class="con">


            <div class="con-tooltip right">
                <li><a class="text-white" href="EmployeeRegForm.php">Register New Employee</a></li>
                <div class="tooltip ">
                    <p><img class = "img-thumbnail" src="pics/Kitten2BG.jpg">Register a new employee by filling out the registration form and entering the new employee's details</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white" href="ManagerRegForm.php">Register New Manager</a> </li>
                <div class="tooltip ">
                    <p><img class = "img-thumbnail" src="pics/HamsterBG.jpg">Register a new manager into the system by filling out the manager registration form. Be sure to show them around the facility.</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white" href="ViewEmployeeInfo.php">View Employee Information</a> </li>
                <div class="tooltip ">
                    <p><img class = "img-thumbnail" src="pics/AfricanGreyBG.jpg">View any employee's information by entering their employee id into the displayed form</p>
                </div>
            </div>


            <div class="con-tooltip right">
                <li><a  class="text-white" href="ViewClientInfo.php">View Client Information</a> </li>
                <div class="tooltip ">
                    <p><img class = "img-thumbnail" src="pics/TurtleBG.jpg">View all information regarding a client's pet, including where the pet is currently enrolled and which employee is overlooking the treatment</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white" href="ViewBillingInfo.php">View Billing Information</a>  </li>
                <div class="tooltip ">
                    <p><img class = "img-thumbnail" src="pics/FishBG.jpg">Get financial statistics on how well they facility is doing by entering the date after which you want to view the bills.</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white" href="ViewDepartmentInfo.php" >View Departments</a> </li>
                <div class="tooltip ">
                    <p><img class = "img-thumbnail" src="pics/IguanaBG.jpg">View all the departments in the facility and their respective services and costs.</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white" href="Main.php">Log Out</a>  </li>
                <div class="tooltip ">
                    <p><img class = "img-thumbnail" src="pics/MainBG.jpg">Log out of the system and go back to the main page.</p>
                </div>
            </div>

        </div>
    </ul>
</div>
<script src="https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js"></script>
</body>
</html>