<?php
    session_start();
	if(! isset($_SESSION['email'])) {
		echo "test";
		header ("Location: index.php");
	}
		/*	
		File    : personal.php
		Purpose : Contains all html data and Php data for showing personal info
		Author  : Saurabh Mehta	*/
?>

<?php
	$PageTitle = "Personal";
	if(isset($_SESSION['email']) and (isset($_SESSION['id']))) {
	$email = $_SESSION['email'];
	$id = $_SESSION['id'];
	$name = $_SESSION['name'];
	}
	
	include_once 'dbconnect.php';
	$request = $fm->newFindCommand('admin_user');
	include_once 'header.php';

?>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
		<li><img src="logo.png" height="200" width="300"></li>
		<li><a href="homeAdmin.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
		<li><a href="allusers.php"><span class="glyphicon glyphicon-user"></span>Users</a></li>
		<li class="active"><a href="personal.php">Personal Info</a></li>
		<li><a href="">Add users</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signout.php"><span></span>Signout <span class="glyphicon glyphicon-log-out"></span></a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
  	<div class="col-md-4">
		<div class="col-md-2">
		<div>Id:</div></br>
		<div>User:</div></br>
		<div>Name:</div></br>
		<div>Email:</div></br>
	</div>

<?php
	
	
	$request->addFindCriterion('id', $id);
	$result = $request->execute();
	$records = $result->getRecords();
	
	if (FileMaker::isError($records)) {
		echo $records->getMessage();
		if (! isset($result->code) || strlen(trim($result->code)) < 1) {
			echo 'Error';
		} else {
			echo 'No such record (Error Code: '.$result->code.')';
		}
	} else {
		foreach ($records as $record) {
?>
			<div class="col-md-2">
				<div><?php echo $record->getField('id'); ?></div></br>
				<div><?php echo $record->getField('user'); ?></div></br>
				<div><?php echo $record->getField('name'); ?></div></br>
				<div><?php echo $record->getField('email'); ?></div></br>
			</div>
		</div>
	</div>
			
<?php		
		}
    }
?>
</table>
  </body>
</html>	

