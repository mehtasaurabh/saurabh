<?php
/* 	File    : home.php
	Purpose : Contains all html data and Php data for  Home Page
	Author  : Saurabh Mehta 		*/
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
        <li><img src="logo.png" height="300" width="400"></li>
        <li class="active"><a href="homeAdmin.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
        <?php
			$n=$_SESSION["user"]; if("$n"== "Admin"){
			echo "<li><a href="."allusers.php.".">Users</a></li>";
		}
		?>
        <li><a href="personal.php">Personal Info</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="signout.php">Signout <span class="glyphicon glyphicon-log-out"></span></a></li>
	  </ul>
    </div>
  </nav>

<?php
	include_once 'footer.php';
?>