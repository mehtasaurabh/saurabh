<?php
	require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('admin_user', '172.16.9.62', 'admin', 'admin_userfm');
	$record = $fm->createRecord('admin_user');
	$record->setField('user', 'admin'); 
	$record->setField('name', 'admin');
	$record->setField('email', 'admin@mindfire.com');
	$record->setField('password', 'admin');
	$result = $record->commit();

?>