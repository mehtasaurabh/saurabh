<?php
/*  	File	 : aboutUs.php
		Purpose	 : display information related to hospital
		Author 	 : Saurabh Mehta */
?>

<?php
$PageTitle = "Home";
include_once 'header.php';
?>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><img src="logo.png" height="300" width="400"></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<center>
			<h1 style="color:blue">WELCOME TO Medicure hospitals</h1>
		</center>
		<p>Medicure is chain of hospitals. We have our hospitals in various cities in India and other countries.
			Patient satisfaction is our top most priority. 
			<div class="lead">Salient feature of Medicure Hospitals</div>
			<ul class="list-group">
				<li class="list-group-item">Highly qualified doctors </li>
				<li class="list-group-item">Modern labs</li> 
				<li class="list-group-item">Links with other hospitals</li> 
				<li class="list-group-item">provides services in various medicine system including(allopathy,homoeopathy,ayurvedic,traditional chinese medicines)</li> 
				<li class="list-group-item">humble staff</li> 
				<li class="list-group-item">24*7 available Nurses</li>
				<li class="list-group-item">Best quality nutritious food</li> 				
			</ul>
		</p>
		<p class="lead" align="right">
			Contact us: 1800 2525 52
		</p>
	</div>
	  </body>
</html>
