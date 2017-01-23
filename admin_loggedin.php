<?php
/*		File	 : admin_loggedin.php
		Purpose	 : for admins who have logged in 
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
            <li class="active"><a href="admin_loggedin.php">Admin</a></li>
			<li><a href="show_user.php">Show users</a></li>
			<li><a href="register.php">Add user</a></li>
			<li><a href="register.php">Add admin</a></li>
            <li><a href="home.php">Logout</a></li>
          </ul>
        </div>
      </nav>
	  <p>you are on admin page</p>
	  
	  
  </body>
</html>
