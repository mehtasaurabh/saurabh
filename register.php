<?php
/*		File	 : register.php
		Purpose	 : registeration page 
		Author 	 : Saurabh Mehta --> */
?>


<html>
  <head>
    <title>Register</title>
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
		 <li class="active"><a href="register.php">Register</a></li>
		 <li><a href="login.php">Login</a></li>
       </ul>
     </div>
   </nav>
   <form action="register_data.php" class="form-horizontal container" name="registerForm" method="post" id="form">
	  <div class="container-fluid form-group">
	    <div class="col-sm-10">
		  <label class="control-label col-sm-4">Name:</label>
		  <div class="col-sm-6">
	        <input type="text" id="email" name="name" class="form-control" required/>
		  </div>
		  <br />
		  <label class="control-label col-sm-4">Email:</label>
		  <div class="col-sm-6">
	        <input type="email" id="email" name="email" class="form-control" required/>
		  </div>
		  <br />
		  <label class="control-label col-sm-4">Password:</label>
		  <div class="col-sm-6">
		    <input type="password" id="password" name="pass" class="form-control" required/>
		  </div>
		  <label class="control-label col-sm-4">Register As:</label>
		  <div class = "col-sm-6">
		    <select id="user-type" class="from-control" name="userType" >
			  <option value="admin">admin</option>
			  <option value="user">user</option> 
		    </select>
		  </div>
		</div>
	  </div>
	  <div class="form-style">
	    <center><input type='submit' class="btn btn-info" name='btn-register' value='register'></center>
	  </div>      
   </form>

	
	
  </body>
</html>
  