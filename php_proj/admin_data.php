<!--  	File	 : admin_data.php
		Purpose	 : this connects admin_reg to database
		Author 	 : Saurabh Mehta -->

<?php
    //declaring variable
    $name = mysql_real_escape_string($_POST["name"]);
    $pass =  mysql_real_escape_string($_POST["pass"]);
	$email = mysql_real_escape_string($_POST["email"]); 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database";
    //establishing connection
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO adminregistered (name, pass, email)
		VALUES ('$name', '$pass', '$email')";
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "New record created successfully";
	}
	catch(PDOException $e) {
	    echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>