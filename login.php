<?php
/*		File	 : login.php
		Purpose	 : login page
		Author 	 : Saurabh Mehta */
?>



<html>
  <head>
    <title>Login</title>
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
		  <li class="active"><a href="login.php">Login</a></li>
        </ul>
      </div>
    </nav>
	<form action="login_data.php" class="form-horizontal container" name="LoginForm" method="post" id="form">
	  <div class="container-fluid form-group">
		<div class="col-sm-10">
		  <label class="control-label col-sm-4">Email:</label>
		  <div class="col-sm-6">
	        <input type="email" id="email" name="email" class="form-control" required/>
		  </div>
		  <br>
		  <label class="control-label col-sm-4">Password:</label>
		  <div class="col-sm-6">
		    <input type="password" id="password" name="pass" class="form-control" required/>
		  </div>
		  <label class="control-label col-sm-4">Login As:</label>
		  <div class = "col-sm-6">
		    <select id="user-type" class="from-control" name="userType" />
			  <option value="admin" name="admin">admin</option>
			  <option value="user" name="user">user</option> 
		    </select>
		  </div>
		</div>
	  </div>
	  <div class="form-style">
		<a href="#"><center>forget password</center></a>
	  </div>
	  <div class="form-style">
		<center><input type='submit' class="btn btn-info" name='btn-login' value='Login'></center>
	  </div>      
    </form>

	
	
  </body>
</html>
  