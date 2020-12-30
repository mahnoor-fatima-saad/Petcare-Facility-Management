<html>
<head>
    <meta charset="utf-8">
    <title>Employee Page</title>
    <link rel="stylesheet" type="text/css" href="css/EmployeePageNav.css" media="screen">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css" >
    <!-- Icon -->
    <link rel = "icon" href ="pics/icon.png"  type = "image/x-icon">
    <!-- Jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
<div class = "navbts">
    <ul class = "topnavbts">
        <div class="con">


            <div class="con-tooltip right">
                <li><a class="text-white" href="ClientRegForm.php" >Register Pet</a> </li>
                <div class="tooltip ">
                    <p>Click here if you're a new customer and you want to register the pet to available our worldclass services. Thankyou</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white"href="ViewCaseInfo.php" >View Case Information</a> </li>
                <div class="tooltip ">
                    <p>Click here if you want to view the information of a certain case of any pet regiestered with us.</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white"href="ViewPersonalInfo.php">View Personal Information</a> </li>
                <div class="tooltip ">
                    <p>Click here if you want to see your personal information. Proceed to see your credentials.</p>
                </div>
            </div>


            <div class="con-tooltip right">
                <li><a  class="text-white"href="ViewServicesInfo.php">View Services Information</a> </li>
                <div class="tooltip ">
                    <p>Click here if you want to see the list of the services we provide with detail and the amount of money we charge.</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white"href="ContactOwner.php" >Contact Owner</a> </li>
                <div class="tooltip ">
                    <p>Please click here if you want to contact the owner of any pet in case of any issue.</p>
                </div>
            </div>

            <div class="con-tooltip right">
                <li><a  class="text-white" href="php/Logout.php" >Log Out</a> </li>
                <div class="tooltip ">
                    <p>Please click here to log out and navigate to the previous page.</p>
                </div>
            </div>

        </div>
    </ul>
</div>
<script src="https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js"></script>
</body>
</html>
