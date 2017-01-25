<?php
/*  File	 : header.php
	Purpose	 : create header which will be used in different files
	Author 	 : Saurabh Mehta */
?>

<!DOCTYPE html>
<html>
  <head>
	<meta name="viewport" content="width=device-width" />
	<meta charset = "utf-8"/>
	<title><?= isset($PageTitle) ? $PageTitle : "Default Title"?></title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
  </head>