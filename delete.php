<?php
/*	File    : delete.php
	Purpose : Used to delete any record
	Author  : Saurabh Mehta	*/
?>

<?php
	
	include_once 'dbconnect.php';
	
	
	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];
		$rec = $fm->getRecordById('admin_user', $id);
		$result = $rec->delete();
		// Checking Errors 
		if (FileMaker::isError($result)) {
		echo $result->getMessage();
			if (! isset($result->code) || strlen(trim($result->code)) < 1) {
				echo 'A System Error Occured';
			} else {
				echo 'No Records Found (Error Code: '.$result->code.')';
			}
		} else {
			header("Location: allusers.php");
		}
	}
?> 