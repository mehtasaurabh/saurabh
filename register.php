<?php
/* 	File    : register.php
	Purpose : Contains all html data and php validation data for the creation of registration page
	Author  : Saurabh Mehta	*/
?>

<?php
	$error = false;
	/* Checking all fields are filled or not */
	if(count($_POST)>0) {
		foreach($_POST as $key=>$value) {
			if(empty($_POST[$key])) {
				$message = ucwords($key) . " field is required";
				$error = true;
				break;
			}
		}
	
		/* Username Validation */
		if(strlen($_POST['username']) < 5){
			$nameError = 'Should be atleast 5 charecters';
			$error = true;
		}
	
		/* Password Matching Validation */
		if($_POST['password'] != $_POST['confirmPassword']){ 
			$passError = 'Passwords should be same';
			$error = true;
		}
	
		/* Email Validation */
		if(!isset($message)) {
			if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$emailError = 'Invalid Email';
				$error = true;
			}
		}
	
		include_once 'dbconnect.php';
		$user = mysql_real_escape_string($_POST['selectUser']);
		$name = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['password']);
		$sql = "SELECT name, email FROM logindata";
		$result = $conn->query($sql);
		$flag = 0;
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			if($name == $row["name"])
			{
				$nameError = 'Username already exists';
				$error = true;
			}
			if($email == $row["email"]) {
				$emailError = 'Email already exists';
				$error = true;
				}
			}
		}
	 
		if(!$error) {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO logindata (user, name, email, password)
		VALUES ('$user','$name','$email','$pass')";
		
		$res=$conn->exec($sql);
		if(!empty($res)) {
			$message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$message = "Problem in registration. Try Again!";	
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
		<li><a href="login.php">Login</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="aboutUs.php">AboutUs</a></li>
	  </ul>
	</div>
  </nav>
  <div class="container">
	<div class="row">
	  <div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
		  <div class="panel-heading">
			<div class="row">
			  <div class="col-xs-6">
				<a href="login.php" id="login-form-link">Login</a>
			  </div>
			  <div class="col-xs-6">
				<a href="register.php" class="active" id="register-form-link">Register</a>
			  </div>
			</div>
			<hr />
		  </div>
		  <div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
				<form id="register-form" action="register.php" method="post">
				  <div><span style="color:red" id="name-error">
					<?php 
						if(isset($message)) echo $message; 
					?></span>
				  </div>
				  <div class="form-group">
					<div class = "styled-select select">
					  <label class="SelectControl" for="RegisterAs" >Register As :</label>
						<select id="formSelectUser" name=selectUser>
						  <option value="Admin">Admin</option>
					      <option value="User">User</option>	
						</select>
					</div>
				  </div>
				  <div class="form-group">
				    <input type="text" name="username" id="name" class="form-control" 
					placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" >
					<span style="color:red" id="name-error">
					  <?php
						  if(isset($nameError)) {
						  echo $nameError;
						}
					  ?>
					</span>
				  </div>
				  <div class="form-group">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email Address"
					value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
					<span style="color:red" id="email-error">
					<?php
						if(isset($emailError)) {
						echo $emailError;
						}
					?>
					</span>
				  </div>
				  <div class="form-group">
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">
					<span style="color:red" id="password-error">
					  <?php
						if(isset($passError)) {
						echo $passError;
						}
					  ?>
					</span>
				  </div>
				  <div class="form-group">
					<input type="password" name="confirmPassword" id="confirm-password" 
					class="form-control" placeholder="Confirm Password">
					<span style="color:red" id="password-error">
					<?php
						if(isset($passError)){
						echo $passError;
						}
					?>
					</span>
				  </div>
				  <div class="form-group">
					<div class="row">
					  <div class="col-sm-6 col-sm-offset-3">
					    <input type="submit" name="submit" id="submit"
					    class="form-control btn btn-register" value="Register Now">
					  </div>
					</div>
				  </div>
			    </form>
			  </div>
		    </div>
	      </div>
		</div>
	  </div>
	</div>
  </div>
  <?php
	  include_once 'footer.php';
  ?>
