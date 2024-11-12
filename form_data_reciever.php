<!DOCTYPE html>
<html>
<head>
	<title>Form data Recieved</title>
</head>
<body>
	<?php 
		// $firstname = $_GET['txtFname'];
		// $lastname = $_GET['txtLname'];
		// $sex = $_GET['radSex'];

		// if ($sex == 'Male') {
		// 	echo "Hello sir $firstname $lastname";
		// }else{
		// 	echo "Hello maam $firstname $lastname";
		// }

		// $firstname = $_POST['txtFname'];
		// $lastname = $_POST['txtLname'];
		// $sex = $_POST['radSex'];

		// if ($sex == 'Male') {
		// 	echo "Hello sir $firstname $lastname";
		// }else{
		// 	echo "Hello maam $firstname $lastname";
		// }

		$firstname = $_REQUEST['txtFname'];
		$lastname = $_REQUEST['txtLname'];
		$sex = $_REQUEST['radSex'];

		if ($sex == 'Male') {
			echo "Hello sir $firstname $lastname";
		}else{
			echo "Hello maam $firstname $lastname";
		}


	 ?>
</body>
</html>