<?php
/*	File    : homeAdmin.php
	Purpose : Contains all html data and Php data for Admin Home Page
	Author  : Saurabh Mehta	*/
?>

<?php
	session_start();
	$PageTitle = "Home";
	include_once 'header.php';
?>
<body>
  <nav class="navbar navbar-default">
	<ul class="nav navbar-nav">
	  <li><img src="logo.png" height="200" width="300"></li>
	  <li><a href="homeAdmin.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
	  <li><a href="allusers.php"><span class="glyphicon glyphicon-user"></span>Users</a></li>
	  <li><a href="personal.php">Personal Info</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	  <li><a href="login.php">Signout <span class="glyphicon glyphicon-log-out"></span></a></li>
	</ul>
  </nav>

<?php
	include_once 'footer.php';
?>