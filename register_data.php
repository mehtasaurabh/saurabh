<?php
/*		File	 : register_data.php
		Purpose	 : connects form to the database 
		Author 	 : Saurabh Mehta */
?>



<?php
  //declaring variable
  $name = mysql_real_escape_string($_POST["name"]);
  $email = mysql_real_escape_string($_POST["email"]); 
  $pass =  mysql_real_escape_string($_POST["pass"]);
  $userType = mysql_real_escape_string($_POST["userType"]);
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "reg_logDB";
  //establishing connection
  
  try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO admin_users (name, email, pass, userType)
		VALUES ('$name', '$email', '$pass', '$userType')";
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "New record created successfully";
	}
	catch(PDOException $e) {
	    echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>
<html>
  <head>
    <title>register_data</title>
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
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </nav>
  </body>
</html>	
	  