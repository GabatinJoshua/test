<?php 
	$arrMonths = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Form Automation</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
						<select name="drpMonths" class="form-control d-inline-block mb-2">
						<?php 
							if (isset($arrMonths)) {
								foreach ($arrMonths as $key => $value) {
								if($value == date('F'))
									echo '<option value="' .  $value .'" selected>' . $value . '</option>';
								else
									echo '<option value="' .  $value .'">' . $value . '</option>';
								}
							}
						?>
				</select>

				<select name="drpDays" class="form-control d-inline-block mb-2">
						<?php
							for ($i=1; $i < 32; $i++) { 
								if($i == date('d'))
									echo '<option value="' .  $i .'"selected>' . $i . '</option>';
								else
									echo '<option value="' .  $i .'">' . $i . '</option>';

							}
					 	?>
				</select>

				<select name="drpYears" class="form-control d-inline-block mb-2">
					<?php
						for ($i=1824; $i <= 2024; $i++) { 
							if($i == date('Y') - 10)
								echo '<option value="' .  $i .'"selected>' . $i . '</option>';
							else
								echo '<option value="' .  $i .'">' . $i . '</option>';

						}
					 ?>
				</select>

				<button type="submit" class="btn btn-primary"><i class="fa-regular fa-heart"></i> Process</button>
			</div>
		</div>
	</div>

	

	<script type="text/javascript" href="js/jquery-3.7.1.js.js"></script>
	<script type="text/javascript" href="js/bootstrap.js"></script>
</body>
</html>