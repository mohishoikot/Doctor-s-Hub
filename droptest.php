<!DOCTYPE html>
<html>
<head>
	<title>BALBA</title>
</head>
<body>
	<form method="post">
		<select name="colr"> 
			<option>red</option>
			<option>blue</option>
			<option>orange</option>
			<option>black</option>
			<option>green</option>
		</select>
			<button type="submit" name="loc">Go!</button>
		
	</form>
	<?php
		if (isset($_POST['loc'])) {
			# code...
			echo $_POST['colr'];
		}
	?>

</body>
</html>