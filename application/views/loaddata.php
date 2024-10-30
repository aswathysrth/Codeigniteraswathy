<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1><?php 
			if($details){
				foreach($details as $d){
					echo $d->Id."-".$d->Name."-".$d->Pass." ".$d->Email."</br>"; 
				}
				
			}
			

	?></h1>
	
</body>
</html>