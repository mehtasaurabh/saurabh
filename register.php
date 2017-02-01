<?php
/*
	File    : register.php
	Purpose : Contains all html data and php validation data for the creation of registration page
	Author  : Saurabh Mehta	
*/

if(isset($_POST['submit'])) {
    
	$error = false;
	//including FM database
	include_once 'dbconnect.php';
		
	
	$request = $fm->newFindCommand('admin_user');
    
    
    $user = trim($_POST['selectUser']);
    $user = strip_tags($user);
    $user = htmlspecialchars($user);
    
    $name = trim($_POST['username']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
	$email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    
    // name validation
    if (strlen($name) < 3) {
		$error = true;
		$nameError = "Name must have atleast 3 characters";
		} else {
			$nameError = "";
		}
    // email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter valid email address.";
    } else {
		$emailError = "";
    }
    
    // password validation
    if (strlen($password) < 4) {
		$error = true;
		$passError = "Password must have atleast 4 characters.";
    } else {
		$passError = "";
    }
    
    // execute if there is no error
    if(!$error){
		
		$record = $fm->createRecord('admin_user');

		$record->setField('user', $user);
		$record->setField('name', $name);
		$record->setField('email', $email);
		$record->setField('password', $password);
		
		$result = $record->commit();
		if(!empty($result)) {
			$msg = "SUCCESSFUL REGISTERATION";
		} else {
			$msg = "Problem in Registeration";
		}
    }
}
$PageTitle = "Register";
include_once 'header.php';

?>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
	  <ul class="nav navbar-nav">
		<li><img src="logo.png" height="200" width="300"></li>
		<li class="active"><a href="register.php">Register</a></li>
		<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="aboutUs.php">AboutUs</a></li>
	  </ul>
	</div>
  </nav>
	
  <form action="" class="form-horizontal container" name="RegisterForm" method="post" id="regform">
    <div class="container-fluid form-group">
	  <div class="col-sm-10">
	    <label class="control-label col-sm-4">Name:</label>
		<div class="col-sm-6">
		  <input type="text" id="name" name="username" class="form-control" placeholder="Your Name"/>
		  <span style="color: red">
			<?php
				if(isset($nameError)){
				echo $nameError;
			  }
			?>
		  </span><br/>
		</div>
		<label class="control-label col-sm-4">Email:</label>
		<div class="col-sm-6">
		  <input type="text" id="email" name="email" class="form-control" placeholder="Email address"/>
		  <span style="color: red">
			<?php
				if(isset($emailError)){
				echo $emailError;
				}
			?>
		  </span><br/>
		</div>
		<label class="control-label col-sm-4">Password:</label>
		<div class="col-sm-6">
		  <input type="password" id="password" name="password" class="form-control" placeholder="should be atleast 4 characters"/>
		  <span style="color: red">
			<?php
				if(isset($passError)){
				echo $passError;
				}
			?>
		  </span><br/>
		</div>
		<label class="control-label col-sm-4">Register As:</label>
		<div class = "col-sm-6">
		  <select id="select-user" class="from-control" name="selectUser">
			<option value="Admin">Admin</option>
			<option value="User">User</option>
	      </select>
		</div>
	  </div>
	</div>
	<div class="form-style">
	  <div class="row">
	    <div class="col-md-6">
		  <center>
			<input type='submit' class="btn btn-lg btn btn-success" name='submit' value='Register' />
		  </center>
		</div>
	  </div>
	</div>  
  <div >
	<span style="color:red"><?php if(isset($msg)) echo $msg; ?></span>
  </div>
</form>
</body>
</html>
  