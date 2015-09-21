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

                <li class="pure-menu-item"><a href="logout.php" class="pure-menu-link" style="font-family:Raleway">LOG OUT</a></li>
            </ul>
        </div>
    </div>
   
   <div id="main">
        <div class="header">
            <h1 style="font-family:Raleway">South Lot Parking</h1>
            <h2 style="font-family:Raleway">Add and search students.</h2>
        </div>
    </div>

</div>





<script src="js/ui.js"></script>


</body>
</html>
<?php
#connect to the database
include '../restricted/datalogin.php';
$handler = new PDO('mysql:host=sql313.byethost31.com:3306;dbname=b31_16498711_kleinoakparking;charset=utf8',$MYDB_USER,$MYDB_PASS);
$handler->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

#retrieve used parking spots
$sth = $handler->prepare("SELECT parking_spot FROM bus");
$sth->execute();
$used_spaces = $sth->fetchAll(PDO::FETCH_COLUMN, 0);

#retrieve all student IDs (first student) already in the lot
$sth1 = $handler->prepare("SELECT studentID1 FROM bus");
$sth1->execute();
$studentIDs1 = $sth1->fetchAll(PDO::FETCH_COLUMN, 0);

#retrieve all student IDs (second student) already in the lot
$sth2 = $handler->prepare("SELECT studentID2 FROM bus");
$sth2->execute();
$studentIDs2 = $sth2->fetchAll(PDO::FETCH_COLUMN, 0);

#create an array of possible_spaces to generate random integers from
$possible_spaces = array();

for ($i=1; $i < 86; $i++) { 
	if (!in_array($i,$used_spaces))
	{
		array_push($possible_spaces, $i);
	}
}

$possible_spaces_length = count($possible_spaces);

$form=$_POST;
$student_name=$form["student_name"];
$student_ID = $form["student_ID"];
$student_grade = explode("th", $form["grade"])[0];

#assigns the single student a parking spot as long as their information is valid
#also adds new student to the database
if (strlen(str_replace(' ', '', $student_name))!=strlen($student_name) && $student_name&&$student_ID&&$student_grade&&!in_array($student_ID,$studentIDs1))
{
	$student_name_parts = explode(" ", $student_name);
	$lastname = $student_name_parts[1];
	$firstname = $student_name_parts[0];
	$parkingspot = $possible_spaces[floor(mt_rand(0,$possible_spaces_length-1))];
	$sql = "INSERT INTO bus ( parking_spot, last_name1, first_name1, studentID1, grade_level1 ) VALUES ( :parkingspot, :lastname, :firstname, :student_ID, :student_grade )";
	$q = $handler->prepare($sql);
	$q->execute(array(	':parkingspot' => $parkingspot,
						':lastname'=>$lastname,
						':firstname'=>$firstname,
						':student_ID'=>$student_ID,
						':student_grade'=>$student_grade));
	echo "<div class=\"content\">
			<br><h1 style=\"color:black;font-family:Raleway\"> $student_name's Parking Spot is: #$parkingspot! </h1>	
			<a href=buslot.php style=\"font-family:Raleway\"><button class=\"button-success pure-button\">Success!</button></a>
		  </div>";
}

#if carpooling, it assigns ONE parking spot to the two students
#adds the two new students to the database
else{

	$student_name1 = $form["student_name1"];
	$student_ID1 = $form["student_ID1"];
	$student_grade1 = explode("th", $form["grade1"])[0];


	$student_name2 = $form["student_name2"];
	$student_ID2 = $form["student_ID2"];
	$student_grade2 = explode("th", $form["grade2"])[0];

	if ((strlen(str_replace(' ', '', $student_name1))!=strlen($student_name1)&&strlen(str_replace(' ', '', $student_name2))!=strlen($student_name2))&&($student_name1&&$student_ID1&&$student_grade1)&&($student_name2&&$student_ID2&&$student_grade2)&&((!in_array($student_ID2,$studentIDs2)&&!in_array($student_ID2,$studentIDs1))&&(!in_array($student_ID1,$studentIDs1)&&!in_array($student_ID1,$studentIDs2))))
	{
		$student_name_parts1 = explode(" ", $student_name1);
		$lastname1 = $student_name_parts1[1];
		$firstname1 = $student_name_parts1[0];
		$student_name_parts2 = explode(" ", $student_name2);
		$lastname2 = $student_name_parts2[1];
		$firstname2 = $student_name_parts2[0];
		$parkingspot = $possible_spaces[floor(mt_rand(0,$possible_spaces_length-1))];
		$sql = "INSERT INTO bus ( parking_spot, last_name1, first_name1, studentID1, grade_level1, last_name2, first_name2, studentID2, grade_level2 ) 
				VALUES ( :parkingspot, :lastname1, :firstname1, :student_ID1, :student_grade1, :lastname2, :firstname2, :student_ID2, :student_grade2)";
		$q = $handler->prepare($sql);
		$q->execute(array(':parkingspot' => $parkingspot,
						':lastname1'=>$lastname1,
						':firstname1'=>$firstname1,
						':student_ID1'=>$student_ID1,
						':student_grade1'=>$student_grade1,
						':lastname2'=>$lastname2,
						':firstname2'=>$firstname2,
						':student_ID2'=>$student_ID2,
						':student_grade2'=>$student_grade2));
		echo "<div class=\"content\">
				<br><h1 style=\"color:black;font-family:Raleway\"> $student_name1 and $student_name2's Parking Spot is: #$parkingspot </h1>
			 	<a href=buslot.php style=\"font-family:Raleway\"><button class=\"button-success pure-button\">Success!</button></a>
			  </div>";
	}

	else

	{
		if (in_array($student_ID,$studentIDs1) || in_array($student_ID,$studentIDs2))
                {
                     echo "<div class=\"content\"><h2 style=\"color:black;font-family:Raleway\" >$student_name's ID is already assigned a spot. Please check the input data.</h2></div>";
                }
		elseif (in_array($student_ID2,$studentIDs2) || in_array($student_ID2, $studentIDs1))
                {
                     echo "<div class=\"content\"><h2 style=\"color:black;font-family:Raleway\" >$student_name2's ID is already assigned a spot. Please check the input data.</h2></div>";
                }
                
                else
                {
                     echo "<div class=\"content\"><h2 style=\"color:black;font-family:Raleway\" >Please enter in valid values.</h2></div>";
                }
	}
}

?>

