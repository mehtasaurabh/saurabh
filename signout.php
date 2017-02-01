<?php
	/*	File    : signout.php
		Purpose : destroys the session and redirects to login page
		Author  : Saurabh Mehta	*/
?>

<?php

	session_start();
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("location: index.php");
    exit;
?>