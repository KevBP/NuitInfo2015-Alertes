<?php
$user = "web-user";
$pwd = "JZDfT6QwZhppvVfF";
$con=mysqli_connect("localhost", $user, $pwd,"daddy-staline");

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	
if (isset($_POST['date-evenement'])) {
	echo $_POST['date-evenement'];
}

$titre = mysqli_real_escape_string($con, $_POST['titre']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$localisation = mysqli_real_escape_string($con, $_POST['localisation']);
$date_evenement = stripcslashes(htmlentities($POST_['date-evenement']));
$heure_evenement = mysqli_real_escape_string($con, $_POST['heure-evenement']);
$niveau = mysqli_real_escape_string($con, $_POST['niveau']);

echo $titre . " " . $message . " " . $localisation . " " . $date_evenement . " " . $heure_evenement . " " . $niveau;
?>
