<?php
	require_once ('filemakerapi/FileMaker.php');
	$fm = new FileMaker('admin_user', '172.16.9.62', 'admin', 'admin_userfm');
	$request = $fm->newFindCommand('admin_user');
	$request->addFindCriterion('email',"mehtasrbh1995@gmail.com");
	$result = $request->execute();
	$record = $result->getRecords(); 

	echo '<table border="1">';
	echo '<tr>';
	echo '<th>User</th>';
	echo '<th>Name</th>';
	echo '<th>Email</th>';
	echo '<th>Password</th>';
	echo '</tr>';
	foreach ($records as $record) {
		echo '<tr>';
		echo '<td>'.$record->getField('user').'</td>';
		echo '<td>'.$record->getField('name').'</td>';
		echo '<td>'.$record->getField('email').'</td>';
		echo '<td>'.$record->getField('password').'</td>';
		echo '</tr>';
	}
	echo '</table>';

?>

