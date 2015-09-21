<?php

session_start();
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
}

if ($username&&$password)
{
	include 'restricted/datalogin.php';
	$connect = mysql_connect("sql313.byethost31.com:3306",$MYDB_USER,$MYDB_PASS) or die("Incorrect credentials.");
	mysql_select_db("b31_16498711_phplogin");

	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
       
	$numrows = mysql_num_rows($query);

	if($numrows!=0)
	{
		while ($row = mysql_fetch_assoc($query))
		{
			$db_username = $row['username'];
			$db_password = $row['password'];
		}

		if ($username == $db_username && $password == $db_password)
		{
			$_SESSION['username']=$db_username;
			include 'sendback.php';
		}

		else{
			echo "Incorrect";
		}
	}

	else
		die("That user doesn't exist");
}

else{

	echo("Please enter a username and password.");
}

?>			