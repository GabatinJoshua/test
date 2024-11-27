<!DOCTYPE html>
<html>
<head>
	<title>Peys App</title>
</head>
<body>
	<h3>Peys App</h3>
	<form method="post">
		<label for="txtSize">Select Photo Size: </label>
		<input type="range" name="txtSize" id="txtSize" min="10" max="100" value="<?php echo isset($_POST['txtSize']) ? $_POST['txtSize'] : 60; ?>" step="10"><br>

		<label for="clrBorder">Select Border Color: </label>
		<input type="color" name="clrBorder" id="clrBorder" value="<?php echo isset($_POST['clrBorder']) ? $_POST['clrBorder'] : '#000000'; ?>"><br>

		<button type="submit" id="btnProcess">Process</button><br><br>

		<?php 
			$colorValue = isset($_POST['clrBorder']) ? $_POST['clrBorder'] : '#000000';
			$sliderValue = isset($_POST['txtSize']) ? $_POST['txtSize'] : 60; 
		?>
		<img src="images/surprise.png" alt="Description of Image" 
		     width="<?php echo $sliderValue; ?>%" 
		     height="<?php echo $sliderValue; ?>%" 
		     style="border: 7px solid <?php echo $colorValue; ?>;">
	</form>
</body>
</html>
