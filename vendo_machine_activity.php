<?php 
	$soda = array('Coke' => 15,'Sprite' => 20, 'Royal' => 20, 'Pepsi' => 15, 'Mountain Dew' => 20);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Vendo Machine</title>
</head>
<body>
	<h3>Vendo Machine</h3>
	<form method="post">
		<fieldset style="width: 500px;">
			<legend>Products</legend>

			<?php 
				$keys = array_keys($soda);

				foreach ($soda as $key => $value): 
				$index = array_search($key, $keys);
				?>

   	 			<input type="checkbox" name="chkSoda[<?php echo $index ?>]" id="chk<?php echo $key; ?>">
    			<label for="chk<?php echo $key; ?>"><?php echo $key; ?> - ₱ <?php echo $value; ?></label><br>
			<?php endforeach; ?>
		</fieldset>

		<fieldset style="width: 500px;">
			<legend>Options</legend>
			<label for="size">Size</label>
			<select name="size" id="size" style="width: 130px;">
				<option value="txtRegular" selected>Regular</option>
				<option value="txtUpSize">Up-Size (add ₱ 5)</option>
				<option value="txtJumbo">Jumbo (add ₱ 10)</option>		
			</select>
			<label for="numQuantity">Quantity</label>
			<input type="number" name="numQuantity" id="numQuantity"  min="0" max="100" step="1" value="0" style="width: 130px;">

			<button type="submit" id="btnOrder">Check Out</button>

			<?php if (isset($_POST['chkSoda']) && isset($_POST['numQuantity']) && isset($_POST['size'])):
					$quantity = $_POST['numQuantity'];

				if ($_POST['size'] == 'txtRegular') {
					$size = 'Regular';
					$price = 0;
				}elseif ($_POST['size'] == 'txtUpSize') {
					$size = 'Up-Size';
					$price = 5;
				}else{
					$size = 'Jumbo';
					$price = 10;
						
				}	

					$selectedCount = isset($_POST['chkSoda']) ? count($_POST['chkSoda']) : 0;
					$itemCount = $quantity * $selectedCount;
					$counter = count($soda);
					$totalAmount = 0;  // Initialize total amount before the loop
					echo '<h4>Purchase Summary:</h4>';
					echo '<ul>';
					for ($i = 0; $i < $counter; $i++) {
					    $sodaKey = array_keys($soda)[$i];
					    $singleAmount = ($soda[$sodaKey] + $price) * $quantity;

					    if (isset($_POST['chkSoda'][$i])) {
					        // Accumulate the total amount
					        $totalAmount += $singleAmount;

					        // Check quantity and echo the correct output
					        if ($quantity > 1) {
					            echo '<li>' . $quantity . ' pieces of ' . $size . ' ' . $sodaKey . ' amounting to ₱' . $singleAmount . '</li>';
					        } else {
					            echo '<li>' . $quantity . ' piece of ' . $size . ' ' . $sodaKey . ' amounting to ₱' . $singleAmount . '</li>';
					        }
					    }
					}
					echo '</ul>';

					// Now echo the total items and total amount inside <p> tags
					echo '<p><b>Total Number of Items: </b>' . $itemCount . '</p>';
					echo '<p><b>Total Amount: </b>₱' . $totalAmount . '</p>';
			

				endif ?>



			 
			 	
	
		</fieldset>
	</form>

</body>
</html>