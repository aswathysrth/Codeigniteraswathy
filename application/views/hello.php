<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1><?php 
			if($name){
				echo "Hello ".$name; 
			}
			else{
				echo "Enter Name";
			}

	?></h1>
	
</body>
</html>