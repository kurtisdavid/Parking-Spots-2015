<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
            header('Location: ../titlepage.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>North Lot</title>



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
            <h1 style="font-family:Raleway">North Lot Parking</h1>
            <h2 style="font-family:Raleway">Add and search students.</h2>
        </div>

        <div class="content">

            <h2 class="content-subhead" style = "color:black;font-family:Raleway">Add Students Manually</h2>
            <form class="pure-form pure-form-stacked" action="north.php" method="POST">
                <fieldset>
                    <legend>Individual</legend>

                    <label for="text">Student Name</label>
                    <input id="text" type="text" name="student_name" placeholder="First Name Last Name">

                    <label for="number">Student ID</label>
                    <input id="number" type="number" name="student_ID" placeholder="Student ID">

                    <label for="state">Grade Level</label>
                    <select id="state" name="grade">
                        <option>11th</option>
                        <option>12th</option>
                    </select>
                    <p></p>
                    <button type="submit" class="pure-button pure-button-primary" name="submit">Add</button>

                </fieldset>

                <p></p>
                <fieldset>
                    <legend>Carpooling</legend>

                    <label for="email">Student 1 Name</label>
                    <input id="email" type="text" name="student_name1" placeholder="First Name Last Name">

                    <label for="email">Student 1 ID</label>
                    <input id="email" type="number" placeholder="Student ID" name="student_ID1">

                    <label for="state">Grade Level</label>
                    <select id="state" name="grade1">
                        <option>11th</option>
                        <option>12th</option>
                    </select>
                    <p></p>
                    <label for="email">Student 2 Name</label>
                    <input id="email" type="text" name = "student_name2" placeholder="First Name Last Name">

                    <label for="email">Student 2 ID</label>
                    <input id="email" type="number" name="student_ID2" placeholder="Student ID">

                    <label for="state">Grade Level</label>
                    <select id="state" name="grade2">
                        <option>11th</option>
                        <option>12th</option>
                    </select>
                    <p></p>
                    <button type="submit" class="pure-button pure-button-primary">Add</button>
                </fieldset>
            </form>


            <h2 class="content-subhead" style = "color:black;font-family:Raleway">Search Student</h2>
            <p>
                
            </p>
            <form class="pure-form" action="searchnorth.php" method="POST">
                <fieldset>
                    <legend>Search Parking Spot</legend>

                    <input id = "number" type="number" placeholder="Student ID" name="studentID">
                    <button type="submit" class="pure-button pure-button-primary">Search!</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>





<script src="js/ui.js"></script>


</body>
</html>
	