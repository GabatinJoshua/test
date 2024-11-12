<!DOCTYPE html>
<html>
<head>
	<title>Form Data</title>
</head>
<body>
	<form method="post" action="form_data_reciever.php">
		<label for="txtFname">First Name</label>
		<input type="text" name="txtFname" id="txtFname" autofocus> <br>
		<label for="txtLname">Last Name</label>
		<input type="text" name="txtLname" id="txtLname"> <br>
		<input type="radio" name="radSex" id="radMale" value="Male" checked>
		<label for="radMale">Male</label>
		<input type="radio" name="radSex" id="radFemale" value="Female">
		<label for="radFemale">Female</label>
		<button type="submit" name="btnSend">Send</button>
	</form>
</html>