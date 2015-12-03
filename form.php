<?php

$con=mysqli_connect("nuitinfo-db.ofni.asso.fr","web-user","JZDfT6QwZhppvVfF","daddy-staline");

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (!isset($_POST['titre'])
		|| !isset($_POST['message'])
		|| !isset($_POST['localisation'])) {
	echo "bite";
}
else {
			
	$titre = mysqli_real_escape_string($con,$_POST['titre']);
	$message = mysqli_real_escape_string($con,$_POST['message']);
	$localisation = mysqli_real_escape_string($con,$_POST['localisation']);
	$date_evenement = mysqli_real_escape_string($con,$POST_['date-evenement']);
	$heure_evenement = mysqli_real_escape_string($con,$_POST['heure-evenement']);
	$niveau = mysqli_real_escape_string($con,$_POST['niveau']);
	
	echo $titre . " " . $message . " " . $localisation . " " . $date_evenement . " " . $date_evenement . " " . $heure_evenement . " " . $niveau;
}
?>
