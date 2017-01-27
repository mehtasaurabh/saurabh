<?php

	require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('admin_user', '172.16.9.62', 'admin', 'admin_userfm');
	$deleteRecord = $fm->newDeleteCommand('name', 'mehta');
	$result = $deleteRecord->execute();

?>