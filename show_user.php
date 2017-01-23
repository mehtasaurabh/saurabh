<?php 
	/*	File	 : show_user.php
		Purpose	 : displays list of users 
		Author 	 : Saurabh Mehta */

?>

<?php
	//make connections
	mysql_connect('localhost','root','');
	//select DB
	mysql_select_db('reg_logdb');
	$sql="select * from admin_users";
 	$records=mysql_query($sql);
?>
<html>
	<head>
		<title>Employee Data</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Welcome</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li class="active"><a href="show_user.php">List of user</a></li>
				</ul>
			</div>
		</nav>
		<table  class="table-striped table-bordered table-hover table-condensed">
			<tr>
				<th>Name</th>
				<th>Email</th>
			<tr>

		<?php
			while($employee=mysql_fetch_assoc($records))
			{
				echo "<tr>";
				echo "<td>".$employee['email']. "</td>";
				echo "<td>".$employee['pass']. "</td>";
			//	echo "<td>".$employee['userType']. "</td>";
				echo "</tr>";
			}//end while loop
		?>
		</table>
	</body>
</html>	
	 

