<?php
	session_start();
	if(!isset($_SESSION['email'])) {
		header ("Location: index.php");
	}
		/* 		
		File    : allusers.php
		Purpose : Contains all html data and Php data for Admin showing all users
		Author  : Saurabh Mehta		*/
?>

<?php
	if((isset($_SESSION['email']) and (isset($_SESSION['password'])))){
		
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$password = $_SESSION['password'];
	}
	$PageTitle = "allUsers";
	include_once "dbconnect.php";
	include_once 'header.php';
    
?>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
	<li><img src="logo.png" height="200" width="300"></li>
    <li><a href="homeAdmin.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
    <li class="active"><a href="allusers.php"><span class="glyphicon glyphicon-user"></span>Users</a></li>
    <li><a href="personal.php">Personal Info</a></li>
	<li><a href="">Add users</a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="signout.php"><span></span>Signout <span class="glyphicon glyphicon-log-out"></span></a></li>
  </ul>
  </div>
</nav>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
    <table  class="table-striped table-bordered table-hover table-condensed">
      <tr>
        <th>id</th>
        <th>user</th>
        <th>name</th>
		<th>email</th>
		<th>&nbsp <span class="glyphicon glyphicon-edit"></span></th>
		<th>&nbsp <span class="glyphicon glyphicon-trash"></span></th>
	</tr>
  </div>
</div>
<?php
	//including FM database
	
    $request = $fm->newFindAllCommand('admin_user');
	$result = $request->execute();
	$records = $result->getRecords();
	if (FileMaker::isError($records)) {
		echo $records->getMessage();
		if (! isset($result->code) || strlen(trim($result->code)) < 1) {
			echo 'A System Error Occured';
		} else {
			echo 'No Records Found (Error Code: '.$result->code.')';
		}
	} else {
		
		// Loop through the associate records 
		foreach ($records as $record) {
			if($_SESSION['email']!=$record->getField('email')){
?>
		<tr>
			<td><?php echo $record->getField('id'); ?></td>
			<td><?php echo $record->getField('user'); ?></td>
			<td><?php echo $record->getField('name'); ?></td>
			<td><?php echo $record->getField('email'); ?></td>		
			<td><a href="update.php?id=<?php echo $record->getrecordid(); ?>">Edit</a></td>
			<td><a href="delete.php?id=<?php echo $record->getField('rec_id'); ?>">Delete</a></td>
		</tr>
		
		<?php
		}
	}
}
?>
</table>	
  </body>
</html>
