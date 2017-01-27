<?php
/*		File    : homeUser.php
		Purpose : Contains all html data and Php data for User Home Page
		Author  : Saurabh Mehta	*/
?>

<?php
session_start();
$PageTitle = "Home";
include_once 'header.php';
?>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <ul class="nav navbar-nav">
		<li><img src="logo.png" height="200" width="300"></li>
		<li class="active"><a href="homeUser.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
		<li><a href="personal.php">Personal Info</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span></span>Signout <span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
  </div>
</nav>

<?php
	include_once 'footer.php';
?>