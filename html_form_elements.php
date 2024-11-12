<!DOCTYPE html>
<html>
<head>
	<title>HTML FORM ELEMENTS</title>
</head>
<body>
	<form>

		<input type="" name="">

		<hr>

		<select name="drpCars" size="3" multiple>
			<option value="Volvo">Volvo</option>
			<option value="Nissan">Nissan</option>
			<option value="Tesla" selected>Tesla</option>
			<option value="Audi">Audi</option>	
		</select>

		<hr>

		<textarea name= "txtPost" rows="10" cols="30"></textarea>

		<hr>

		<button type="button">click me</button>

		<hr>

		<fieldset>
			<legend>Personal Info</legend>
			First Name<input type="" name=""><br>
			Last Name<input type="" name=""><br>
		</fieldset>

		<hr>

		<input type="text" name="dlstBrowsers" list="browsers">
		<datalist id="browsers">
			<option value="FIrefox">
			<option value="Operq">
			<option value="safari">
			<option value="chrome">
			<option value="Edge">
		</datalist>

	</form>
</body>
</html>