<?php
	include_once 'dbconnect.php';
	$id = $_GET['id']; // $id is now defined
    mysqli_query($conn,"DELETE FROM logindata WHERE id='".$id."'");
    mysqli_close($conn);
    header("Location: allusers.php");
?> 