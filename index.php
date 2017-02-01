<?php
    session_start();
	/*	File    : Index.php
		Purpose : Contains all html data and Php data for the login page
		Author  : Saurabh Mehta	*/
?>

<?php
	
	//including FM database
	include_once 'dbconnect.php';
	
	$request = $fm->newFindCommand('admin_user'); 
    if (isset($_POST['login-btn'])) {	
		$error = false;
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
   
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);
		
		
		//email validation
		if (empty($email)) {
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
    
		// password validation
		if (empty($password)) {
			$error = true;
			$passError = "Please enter your password.";
		}
		
    
		if(!$error){
			$email = '=="' . $email . '"';
			$request->addFindCriterion('email', $email);
			$result = $request->execute();
			$records = $result->getRecords();
			
			if (Filemaker::isError($records)) {
				echo $records->getMessage();
				if(! isset($result->code) || strlen(trim($result->code)) < 1) {
					echo 'try again';
				} else {
					echo 'No records found';
				}
			} else {
				foreach ($records as $record) {
					$id = $record->getField('id');
					$name = $record->getField('name');
					$email = $record->getField('email');
					$password =	$record->getField('password');
					$user = $record->getField('user');
				}
			}

			$_SESSION['id'] = $id;
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			
			
			if ($password === $password) {
				if($user === 'User' ) {
					header("Location: homeUser.php");
				} else { 
					header("Location: homeAdmin.php");
				}
			} else {
				$err = "Please Enter the valid details, Try again...";
			} 		
		} else {
				$err = "Please Enter the valid details, Try again...";
		}
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
		<li class="active"><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="aboutUs.php">AboutUs</a></li>
	  </ul>
	</div>
  </nav>
  
  <div class="container">
	<div class="row">
	  <form action="" class="form-horizontal container" name="LoginForm" method="post" id="logform">
	    <div class="container-fluid form-group">
		  <div class="col-sm-10">
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
</body>
</html>
