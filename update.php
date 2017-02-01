<?php
	session_start();
	if(!isset($_SESSION['email'])) {
		header ("Location: index.php");
	}
/*	File    : update.php
	Purpose : Used to update any record
	Author  : Saurabh Mehta	*/


?>
<?php	
	
	if((isset($_SESSION['email']) and (isset($_SESSION['password'])))){
		
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$password = $_SESSION['password'];
	}
	
	// to connect the database
	include_once 'dbconnect.php';

	if (isset($_GET['id'])){
		$id=$_GET['id'];

		// find the associate layout
		$request = $fm->newFindCommand('admin_user');
		$request->addFindCriterion('recordId', $id);
		$result = $request->execute();
		
		
		if (FileMaker::isError($result)) {
			echo $records->getMessage();
			if (! isset($result->code) || strlen(trim($result->code)) < 1) {
				echo 'Please try again';
			} else {
				echo 'No Records Found (Error Code: '.$result->code.')';
			}
		} else {
			$records = $result->getRecords();
			foreach($records as $record){
				$id = $record->getField('id');
				$user = $record->getField('user');
				$name = $record->getField('name');
			}	
		}			
	}
		
	if (isset($_POST['submit'])){
		echo $id;
		echo $_POST['name'];
		echo $_POST['password'];
		$error = false;
		

		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);

		// name validation
		if (empty($name)) {
				$error = true;
				$nameError = "Please enter the name.";
		} else {
				$nameError = "";
		}
		
		// password validation
		if (empty($password)) {
				$error = true;
				$passError = "Please enter password.";
		}else {
				$passError = "";
		}
	
		// execute if there is no error
		if(!$error){
			$request = $fm->newFindCommand('admin_user');
			$request->addFindCriterion('id', $id);
			$result = $request->execute();
			
			if (FileMaker::isError($result)) {
				echo $result->getMessage();
				if (! isset($result->code) || strlen(trim($result->code)) < 1) {
					echo 'A System Error Occured';
				} else {
					echo 'No Records Found (Error Code: '.$result->code.')';
				}
			} else {
				$records = $result->getRecords();
				foreach ($records as $record) {
					$record->setField('name', $name);
					$record->setField('password', $password);
					$record->commit();
				}
			}
		}
	}
	
	
	$PageTitle = "Update";
	include_once 'header.php';
?>


<body>
  <nav class="navbar navbar-default">
	<div class="container-fluid">
	  <ul class="nav navbar-nav">
		<li><img src="logo.png" height="200" width="300"></li>
		<li class="active"><a href="update.php"><span class="glyphicon glyphicon-edit"></span>Update</a></li>
		<li><a href="personal.php">Personal Info</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="signout.php"><span></span>Signout <span class="glyphicon glyphicon-log-out"></span></a></li>
	  </ul>
	</div>
  </nav>
  <form action="" method="post">
	<div class="panel panel-default">
	<div class="panel-body"></div>
		<table  class="table table-striped table-bordered table-hover table-condensed">
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>PASSWORD</th>
				<th></th>
			</tr>
			<tr>
				<td><?php echo $id; ?></td>
				<td><input type='text' id='name' name='name' class='form-control' placeholder='Enter Name' value='<?php echo $name; ?>'>
					<span id="name-info" style="color: red">
						<?php
						if(isset($nameError)){
							echo $nameError;
						} ?>
					</span><br/>
				</td>
				<td><input type='password' id='pass' name='password' class='form-control' placeholder='Enter New Password'>
					<span id="name-info" style="color: red">
						<?php
						if(isset($passError)){
							echo $passError;
						} ?>
					</span><br/>
				</td>
				<td><input type= 'submit' name='submit' id='submit' value='Submit' class="form-control btn btn-login btn btn-success"></td>
			</tr>
		</table>
	</div>
</form> 
   </body>
</html> 
