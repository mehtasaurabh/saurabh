<?php
	/*	File    : login.php
		Purpose : Contains all html data and Php data for the login page
		Author  : Saurabh Mehta	*/
?>

<?php
    session_start();
    $dbname = mysqli_connect("localhost", "root", "", "mydb");
    
    if (isset($_POST['login-btn']))
    {
        $name = mysql_real_escape_string($_POST['username']);
        $pass = mysql_real_escape_string($_POST['password']);
        $user = mysql_real_escape_string($_POST['selectUser']);
        
        $sql = "SELECT * FROM logindata WHERE user='$user' AND name='$name' AND password='$pass'";
        $result = mysqli_query($dbname,$sql);
        $admin='Admin';
        if(mysqli_num_rows($result) == 1) {
			$_SESSION["name"] = "$name";
			$_SESSION["user"] = "$user";
			header("location:home.php");
        }
        else {
            $message = 'Your email or password is incorrect';
        }
    }
	if (isset($_SESSION["name"]))
	{
		header("location:home.php");
	}
	$PageTitle = "Login";
	include_once 'header.php';
?>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
		<li><img src="logo.png" height="200" width="300"></li>
		<li><a href="register.php">Register</a></li>
		<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="aboutUs.php">AboutUs</a></li>
	  </ul>
	</div>
  </nav>
  
  <div class="container">
	<div class="row">
	  <form action="register.php" class="form-horizontal container" name="LoginForm" method="post" id="logform">
	    <div class="container-fluid form-group">
		  <div class="col-sm-10">
  		    <label class="control-label col-sm-4">Name:</label>
			<div class="col-sm-6">
			  <input type="text" id="name" name="username" class="form-control" placeholder="Your Name"/><br>
			</div>
			<label class="control-label col-sm-4">Password:</label>
			<div class="col-sm-6">
			  <input type="password" id="password" name="password" class="form-control" placeholder="should be atleast 4 characters"/><br>
			</div>
			<label class="control-label col-sm-4">Register As:</label>
			<div class = "col-sm-6">
			  <select id="select-user" class="from-control" name="selectUser"><br>
				<option value="Admin">Admin</option>
				<option value="User">User</option>
			  </select><br>
			</div>
			<div class="col-sm-6 col-sm-offset-3"><br>
			  <button type="submit" name="login-btn" id="login-submit"
				class="form-control btn btn-login btn btn-success">
				<span class="glyphicon glyphicon-log-in"></span>
				 Login
			  </button><br>
			</div>
			<div class="form-group">
			  <div class="col-lg-12">
			    <div class="text-center"><br>
				  <a href="#" class="forgot-password">Forgot Password?</a>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
    </div>
  </form>	
  	
 <?php
  include_once 'footer.php';
  ?>