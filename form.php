<?php
$titre = mysqli_real_escape_string($_POST['titre']);
$message = mysqli_real_escape_string($_POST['message']);
$localisation = mysqli_real_escape_string($_POST['localisation']);
$date_evenement = mysqli_real_escape_string($POST_['date_evenement']);
$heure_evenement = mysqli_real_escape_string($_POST['heure_evenement']);
$niveau = mysqli_real_escape_string($_POST['niveau']);

echo $titre . " " . $message . " " . $localisation . " " . $date_evenement . " " . $date_evenement . " " . $heure_evenement . " " . $niveau;
?>
