<!DOCTYPE html>
<html>
<head>
	<title>Input Types Demo</title>
</head>
<body>
	<form>


		<label for="txtFirstName">Frist Name</label>
		<input type="text" name="txtFirstName" id="txtFirstName" autofocus><br>
		<label for="txtLastName">Last Name</label>
		<inpsut type="text" name="txtLastName" id="txtLastName"><br>
		<label for="txtPassword">Password</label>
		<input type="Password" name="txtPassword" id="txtPassword"><br>
		<input type="submit" name="btnSave" value="Send">
		<!-- <button type="submit" name="btnSave1" >Send</button> -->
		<input type="reset" name=""><br>

		<input type="radio" name="radSex" id = "radMale" value="Male" checked>
		<label for="radMale">Male</label><br>
		<input type="radio" name="radSex" id = "radFemale" value="Male">
		<label for="radFemale">Female</label><br>

		<input type="checkbox" name="chkBike" id="chkBike" value="Bike">
		<label for="chkBike">I have a bike</label><br>
		<input type="checkbox" name="chkCar" id="chkCar" value="Bike">
		<label for="chkCar">I have a Car</label><br>
		<input type="checkbox" name="chkPlane" id="chkPlane" value="Bike">
		<label for="chkPlane">I have a Plane</label><br>

		<label for="clrTheme">Pick a Color</label>
		<input type="color" name="clrTheme" id="clrTheme"><br>

		<label for="dtpBirthday">Birthday</label>
		<input type="date" name="dtpBirthday" id="dtpBirthday" value="2000-01-01"> <br>

		<label for="txtEmail">mail Addess: </label>
		<input type="email" name="txtEmail" id="txtEmail"><br>

		<label for="filPhoto">Choose FIle</label>
		<input type="file" name="filPhoto" id="filPhoto"><br>

		<label for="txtNumber">Enter Qunatso</label>
		<input type="number" name="txtNumber" id="txtNumber" min="1" max="5"><br>

		<label for="txtVolume">Olume</label>
		<input type="Range" name="txtVolume" id="txtVolume" min="1" max="5"><br>

		<label for="txtTel">Phon</label>
		<input type="tel" name="txtTel" id="txtTel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" maxlength="10"><br>

		<label for="txtTime">TIME</label>
		<input type="time" name="txtTime" id="txtTime" min="1" max="5"><br>

		<label for="txtUrl">URL</label>
		<input type="url" name="txtUrl" id="txtUrl" min="1" max="5"><br>

	</form>
</body>
</html>