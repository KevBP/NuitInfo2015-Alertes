<?php
require("library.php");
$con = connectToDatabase();

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$titre = mysqli_real_escape_string($con, $_POST['titre']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$localisation = mysqli_real_escape_string($con, $_POST['localisation']);
$date_evenement = mysqli_real_escape_string($con, $_POST['date-evenement']);
$heure_evenement = mysqli_real_escape_string($con, $_POST['heure-evenement']);
$niveau = mysqli_real_escape_string($con, $_POST['niveau']);

$sql = "INSERT INTO ALERTE
		(message_alerte, titre_alerte, localisation_alerte, date_alerte, niveau_alerte) 
		VALUES ($message, $titre, $localisation, $date_evenement, $niveau)";

$req = mysqli_query($sql);

mysqli_close($con);
?>
