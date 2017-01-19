<!--  	File	 : admin_reg.php
		Purpose	 : this page is for admins who are new and want to register
		Author 	 : Saurabh Mehta -->

<html>
  <head>
    <title>Admin_Reg</title>
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <meta charset="utf-8"/>
  </head>
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
	<div class="container">
	  <p class="text-info">Only if you are new or else <a href="admin_log.php">login</a></p>
	  <form class="form-horizontal container" action="admin_data.php" method="post" >
	    <div class="form-group">
		  <label class="control-label col-sm-2">NAME:</label>
		  <div class="col-sm-10">
		    <input type="text" class="form-control" name="name" required/>
		  </div>
		  <label class="control-label col-sm-2">PASSWORD:</label>
		  <div class="col-sm-10">
		    <input type="password" class="form-control" name="pass" required/>
		  </div>
		  <label class="control-label col-sm-2">EMAIL:</label>
		  <div class="col-sm-10">
		    <input type="email" class="form-control" name="email" required/>
		  </div>
		</div>
		<input type="submit" class="btn btn-info" value="Submit Button" >
	  </form>		
	</div>
  </body>	
</html>