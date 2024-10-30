<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1><?php echo $name; ?></h1>
	<h2><?php echo $age; ?></h1>
	<h3><?php 
		$h=implode(",", $hobbies);
		echo "Hobbies:".$h;
	?></h1>
</body>
</html>