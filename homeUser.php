<?php
	session_start();
	if(!isset($_SESSION['email'])) {
		header ("Location: index.php");
	}

	/*	File    : homeUser.php
		Purpose : Contains all html data and Php data for User Home Page
		Author  : Saurabh Mehta	*/
?>

<?php
	$PageTitle = "homeUser";
	include_once 'header.php';
	if(isset($_SESSION['email']) and (isset($_SESSION['id']))) {
		$email = $_SESSION['email'];
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
	}
	
	include_once 'dbconnect.php';
	$request = $fm->newFindCommand('admin_user');

?>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
		<li><img src="logo.png" height="200" width="300"></li>
        <li class="active"><a href="">Personal Info</a></li>
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
			echo 'A System Error Occured';
		} else {
			echo 'No Records Found (Error Code: '.$result->code.')';
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
	

<?php	
	include_once 'footer.php';
?>