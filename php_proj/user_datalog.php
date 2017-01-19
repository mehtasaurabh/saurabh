<!--	File	 : user_datalog.php
		Purpose	 : fetches data from database and check the login of admin
		Author 	 : Saurabh Mehta -->

<?php
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	
	$name = stripcslashes($name);
	$pass = stripcslashes($pass);
	$name = mysql_real_escape_string($name);
	$pass = mysql_real_escape_string($pass);
	
	mysql_connect("localhost","root","");
	mysql_select_db("database");
	
	$result = mysql_query("select * from userregistered where name='$name' and pass = '$pass'")
	or die("failed to query database".mysql_error());
	$row = mysql_fetch_array($result);
	if($row['name'] == $name && $row['pass'] == $pass)
	{
		echo "Login success!! Welcome".$row['name'];
	}
	else
	{
		echo "failed to login!";
		header("location:user_log.php");
	}
	?>