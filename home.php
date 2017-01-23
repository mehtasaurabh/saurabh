<?php 
/*		File	 : home.php
		Purpose	 : create first page of our website which gives option to chose from register and login
		Author 	 : Saurabh Mehta */

?>

<html>
  <head>
    <title>Home</title>
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
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </nav>
	  <h3 class="text-primary">Select any one option based on your type</h3>
	    <ul class="pager">
		  <li><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
  </body>
</html>
	