<!DOCTYPE html>
<html>
<head>
	<title>BAsic Contact FOrm</title>
</head>
<body>
	<h3>Basic Contact Form</h3><hr>
	<form method="post">
		<label for="txtName">Name: <sup style="color:red">*</sup></label><br>
		<input type="text" name="txtName" id="txtName" autofocus required><br>

		<label for="txtEmail">Email: <sup style="color:red">*</sup></label><br>
		<input type="email" name="txtEmail" id="txtEmail" required><br>

		<label for="txtSubject">Subject: <sup style="color:red">*</sup></label><br>
		<input type="text" name="txtSubject" id="txtSubject" required><br>

		<label for="txtMessage">Subject: <sup style="color:red">*</sup></label><br>
		<textarea name="txtMessage" id="txtMessage" rows="5" cols="30" required></textarea><br>

		<button type="submit" name="btnSend">Submit</button>
	</form>
	<hr>

	<?php if(isset($_REQUEST['btnSend'])): ?>

	<h2>Thank You!</h2>
	<p>Submitted Info: </p>
		<?php 
			$name = $_REQUEST['txtName'];
			$email = $_REQUEST['txtEmail'];
			$subject = $_REQUEST['txtSubject'];
			$message = $_REQUEST['txtMessage'];
		?>
		<ul>
			<li><b>Name: </b><?php echo $name; ?></li>
			<li><b>Email: </b><?php echo $email; ?></li>
			<li><b>Subject: </b><?php echo $subject; ?></li>
			<li><b>Message: </b><?php echo $message; ?></li>
		</ul>
	<?php endif ?>
</body>
</html>