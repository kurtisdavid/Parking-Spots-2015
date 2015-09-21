<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Welcome Page</title>

    


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>






  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/side-menu.css">
    <!--<![endif]-->
  


    

    

</head>
<body>






<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="http://kleinoak.kleinisd.net" style="font-family:Raleway">Klein Oak</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="welcome.php" class="pure-menu-link" style="font-family:Raleway">Welcome Page</a></li>
                <li class="pure-menu-item"><a href="northlot.php" class="pure-menu-link" style="font-family:Raleway">North Lot</a></li>

                <li class="pure-menu-item" class="menu-item-divided pure-menu-selected">
                    <a href="southlot.php" class="pure-menu-link" style="font-family:Raleway">South Lot</a>
                </li>

                <li class="pure-menu-item"><a href="buslot.php" class="pure-menu-link" style = "font-family:Raleway">Bus Lot</a></li>

                <li class="pure-menu-item"><a class="pure-menu-link" href="logout.php" style="font-family:Raleway">LOG OUT</a></li>
            </ul>
        </div>
    </div>


    <div id="main">
        <div class="header">
            <h1 style="font-family:Raleway">Welcome.</h1>
            <h2 style="color:#000000;font-family:Raleway">Login Successful</h2>
        </div>

        <div class="content" style="color:#000000">
            <h2 class="content-subhead" style="color:#000000;font-family:Raleway">Begin Working</h2>
            <p>
                The buttons on the side will allow you to navigate between the lots, so click one to start!
            </p>
        </div>
    </div>
</div>





<script src="js/ui.js"></script>


</body>
</html>

<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
            header('Location: ../titlepage.php');
    }
?>
