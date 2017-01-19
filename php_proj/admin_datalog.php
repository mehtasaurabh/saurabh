<!--	File	 : admin_datalog.php
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
	
	$result = mysql_query("select * from adminregistered where name='$name' and pass = '$pass'")
	or die("failed to query database".mysql_error());
	$row = mysql_fetch_array($result);
	if($row['name'] == $name && $row['pass'] == $pass)
	{
		echo "Login success!! Welcome".$row['name'];
	}
	else
	{
		echo "failed to login!";
		header("location:admin_log.php");
	}
	?>
<html>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<h1>
					<ul class="nav navbar-nav">
						<li class="active"><a href="login_page.php">Home</a></li>
    				</ul>
				</h1>
			</div>
		</nav>
		<h1>List of current users.</h1>
		<a href="display_records.php">click me to see the records.</a>
	</body>
</html>