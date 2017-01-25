<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	session_start();
	$conn = new mysqli($servername, $username, $password, $dbname); 
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	$id = $_GET['id'];
	
	if (isset($_POST['submit']))
	{
		$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
		$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
		$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
		
		if ($name == '' || $email == '' || $password == '')
		{
			$error = 'ERROR: Please fill in all required fields!';
		}
		else
		{
			mysqli_query($conn,"UPDATE logindata SET name='$name', email='$email',password='$password' WHERE id='".$id."'");
			mysqli_close($conn);
			$n=$_SESSION["user"];
			$_SESSION["name"] = $name;
			if("$n" == "Admin") {
				header("Location: allusers.php");
			}
			else {
				header("Location: personal.php");
			}
		}
	}
	$PageTitle = "Update";
	include_once 'header.php';
?>

<body>
  <nav class="navbar navbar-default">
	<div class="container-fluid">
	  <ul class="nav navbar-nav">
		<li><img src="logo.png" height="200" width="300"></li>
		<li><a href="home.php">Home</a></li>
		<?php
			$n=$_SESSION["user"]; if("$n"== "Admin"){
			echo "<li><a href="."allusers.php".">Users</a></li>";}
		?>
		<li><a href="personal.php">Personal Info</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="signout.php"><span></span> Signout</a></li>
	  </ul>
	</div>
  </nav>
	<div class="container">
	    <div class="container-fluid form-group">
		  <form action="" method="post">
		    <!--<input type="hidden" name="id" value=""/>-->
		    <div class="col-md-10">
		      <label class="control-label col-md-4">Name:</label>
			  <div class="col-md-6">
			    <input type="text"  name="name" class="form-control" value=""/>
		      </div>
		      <br>
		      <label class="control-label col-md-4">Email:</label>
		      <div class="col-md-6">
		        <input type="email" name="email" class="form-control" />
		      </div>
		      <label class="control-label col-md-4">Password:</label>
		      <div class = "col-md-6" >
			    <input type="password" name="password" class="form-control" value="" />
			  </div>
			<div class="form-group" align="center">
			
	        	<input type='submit' class="btn btn-info" name="submit" value='submit'> 
			</div>  
			</div>
		</form>
	  </div>
	</div>

	
<?php
include_once 'footer.php';
?>