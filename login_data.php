<?php
/*  	File	 : login_data.php
		Purpose	 : connect database to the login page
		Author 	 : Saurabh Mehta -->*/

?>

<?php

	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$userType = $_POST['userType'];
	$email = stripcslashes($email);
	$pass = stripcslashes($pass);
	$userType = stripcslashes($userType);
	$email = mysql_real_escape_string($email);
	$pass = mysql_real_escape_string($pass);
	$userType = mysql_real_escape_string($userType);	

	mysql_connect("localhost","root","");
	mysql_select_db("reg_logdb");

	$result = mysql_query("select * from admin_users where email='$email' and pass = '$pass' and userType = '$userType'")
	or die("failed to query database".mysql_error());
	$row = mysql_fetch_array($result);

	if($row['email'] == $email && $row['pass'] == $pass){
		if($userType == $row['userType']){
			if($userType == "admin"){
				header("location:admin_loggedin.php");
			} else {
				header("location:user_loggedin.php");
			}
		}
	} else {
	    header("location:login.php");
	}

 ?>
<html>
  <head>
    <title>register_data</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	 <meta charset="utf-8"/>
  </head>
  <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Welcome</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </nav>
  </body>
</html>	

