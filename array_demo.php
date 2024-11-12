<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		// $color = array("Red", "Green", "Blue");
		// echo $color[1];

		// $ages = array("Peter" => 22, "Clark" =>32);
		// $size = ['sm' => 10, 'md' => 14, 'pp' => 10];
		// echo $ages['Peter']; 


		// $contacts = array(

		// 	array(
		// 		'name' => 'Niagtious'
		// 	),
		// 	array(
		// 		'name' => 'nyjyy'
		// 	),
		// 	array(
		// 		'name' => 'ddsdsd'
		// 	),
		// 	array(
		// 		'name' => 'dssad'
		// 	)
		// );


		// echo $contacts[1]['name'];


		 $color = array("Red", "Green", "Blue");

		 foreach ($color as $key => $value) {
		 	echo $key . '<br>';
		 }

		for($i=0; $i < count($color); $i++)
			echo $color[$i] . '<br>';


		$ages = array("Peter" => 22, "Clark" =>32, 
			'John' => 15);

		foreach ($ages as $key => $value) {
			echo $key . ' is ' . $value . '<br>';
			# code...
		}


		$contacts = array(

			array(
				'joe' => 'Niagtious'
			),
			array(
				'sdad22' => 'nyjyy'
			),
			array(
				'na1111me' => 'ddsdsd'
			),
			array(
				'nam23232323e' => 'dssad'
			)
		);

 


	?>
</body>
</html>