<!--	File	 : display_records.php
		Purpose	 : records of users will be displayed here
		Author 	 : Saurabh Mehta -->




<?php
	//make connections
	mysql_connect('localhost','root','');
	//select DB
	mysql_select_db('database');
	$sql="select * from userregistered";
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
				<h1>
					<ul class="nav navbar-nav">
						<li class="active"><a href="login_page.php">Home</a></li>
    				</ul>
				</h1>
			</div>
		</nav>
		<table  class="table-striped table-bordered table-hover table-condensed">
			<tr>
				<th>NAME</th>
				<th>PASSWORD</th>
				<th>EMAIL</th>
			<tr>

		<?php
			while($employee=mysql_fetch_assoc($records))
			{
				echo "<tr>";
				echo "<td>".$employee['name']. "</td>";
				echo "<td>".$employee['pass']. "</td>";
				echo "<td>".$employee['email']. "</td>";
				echo "</tr>";
			}//end while loop
		?>
		</table>
	</body>
</html>	
	 