<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Bus Lot</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <style type="text/css">
    		.button-success {
        		background: rgb(28,184,65);
    		}
    		h1{
    			white-space:nowrap;
    		}
    </style>

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
            <h1 style="font-family:Raleway">Bus Lot Parking</h1>
            <h2 style="font-family:Raleway">Add and search students.</h2>
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
        include '../restricted/datalogin.php';

	$handler = new PDO('mysql:host=sql313.byethost31.com:3306;dbname=b31_16498711_kleinoakparking;charset=utf8',$MYDB_USER,$MYDB_PASS);
	$handler->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sth1 = $handler->prepare("SELECT studentID1 FROM bus");
	$sth1->execute();
	$studentIDs1 = $sth1->fetchAll(PDO::FETCH_COLUMN, 0);

	$sth2 = $handler->prepare("SELECT studentID2 FROM bus");
	$sth2->execute();
	$studentIDs2 = $sth2->fetchAll(PDO::FETCH_COLUMN, 0);

	$sth3 = $handler->prepare("SELECT last_name1 FROM bus");
	$sth3->execute();
	$studentLastNames1 = $sth3->fetchAll(PDO::FETCH_COLUMN, 0);

	$sth4 = $handler->prepare("SELECT first_name1 FROM bus");
	$sth4->execute();
	$studentFirstNames1 = $sth4->fetchAll(PDO::FETCH_COLUMN, 0);

	$sth5 = $handler->prepare("SELECT last_name2 FROM bus");
	$sth5->execute();
	$studentLastNames2 = $sth5->fetchAll(PDO::FETCH_COLUMN, 0);

	$sth6 = $handler->prepare("SELECT first_name2 FROM bus");
	$sth6->execute();
	$studentFirstNames2 = $sth6->fetchAll(PDO::FETCH_COLUMN, 0);

	$sth7 = $handler->prepare("SELECT parking_spot FROM bus");
	$sth7->execute();
	$studentParkingSpots = $sth7->fetchAll(PDO::FETCH_COLUMN, 0);

	$form = $_POST;
	$student_ID = $form["studentID"];

	$check = false;
	if ($student_ID)
	{
	for ($i=0; $i < count($studentIDs1); $i++) { 
		if ($student_ID == $studentIDs1[$i])
		{
			$parkingspot = $studentParkingSpots[$i];
			$studentname = $studentFirstNames1[$i] . " " . $studentLastNames1[$i];
			if ($studentIDs2[$i]!=null)
			{
				$studentname2 = $studentFirstNames2[$i] . " " . $studentLastNames2[$i];
				
				echo "<div class=\"content\">
						<br><h1 style=\"color:black;font-family:Raleway\">$studentname and $studentname2's Parking Spot is: #$parkingspot!</h1>
						<a href=buslot.php style=\"font-family:Raleway\"><button class=\"button-success pure-button\">Success!</button></a>
					  </div>";
			}
			else{
				echo "<div class=\"content\">
						<br><h1 style=\"color:black;font-family:Raleway\">$studentname's Parking Spot is: #$parkingspot!</h1>
						<a href=buslot.php style=\"font-family:Raleway\"><button class=\"button-success pure-button\">Success!</button></a>
					  </div>";
			}
			$check=true;
		}
		elseif($student_ID==$studentIDs2[$i])
		{
			$parkingspot = $studentParkingSpots[$i];
			$studentname = $studentFirstNames2[$i] . " " . $studentLastNames2[$i];
			$studentname2 = $studentFirstNames1[$i] . " " . $studentLastNames1[$i];
			echo "<div class=\"content\">
					<br><h1 style=\"color:black;font-family:Raleway\">$studentname and $studentname2's Parking Spot is: #$parkingspot!</h1>
					<a href=buslot.php style=\"font-family:Raleway\"><button class=\"button-success pure-button\">Success!</button></a> 
				  </div>";
			$check=true;
		}
	}

	if ($check==false)
	{
		echo "<div class=\"content\"><h2 style=\"color:black;font-family:Raleway\">Please check if you entered a valid student ID.</h1></div>";
	}
	}
	else{
		echo "<div class=\"content\"><h2 style=\"color:black;font-family:Raleway\">Please check if you entered a valid student ID.</h1></div>";
	}

?>

