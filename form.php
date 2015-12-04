<?php
	require("library.php");
	
	$con = connectToDatabase();
	
	$erreurs = false;
	
	if ($con != NULL && isset($_POST['titre']) && isset($_POST['message'])
			&& isset($_POST['localisation']) && isset($_POST['date-evenement'])
			&& isset($_POST['heure-evenement']) && isset($_POST['niveau'])) {
	
		$titre = mysqli_real_escape_string($con, htmlentities($_POST['titre']));
		$message = mysqli_real_escape_string($con, htmlentities($_POST['message']));
		$localisation = mysqli_real_escape_string($con, htmlentities($_POST['localisation']));
		$date_evenement = mysqli_real_escape_string($con, htmlentities($_POST['date-evenement']));
		$heure_evenement = mysqli_real_escape_string($con, htmlentities($_POST['heure-evenement']));
		$niveau = mysqli_real_escape_string($con, htmlentities($_POST['niveau']));
		
		if ($message < 0 || $message > 2048) {
			$erreurs = true;
			echo "Erreur dans la taille du message";
		}
		
		if ($localisation < 0 || $localisation > 256) {
			$erreurs = true;
			echo "Erreur dans la taille de localisation";
		}
		
		if (strlen($titre) < 5 || strlen($titre) > 256) {
			$erreurs = true;
			echo "Erreur, le titre doit faire plus de 5 caractères et moins de 256.";
		}
		
		if (strtotime($date_evenement) == -1) {
			$erreurs = true;
			echo "Erreur avec la date de l'évènement !";
		}
		
		if ($niveau < 1 || $niveau > 5) {
			$erreurs = true;
		}
		
		$date = $date_evenement." ".$heure_evenement;
		
		if (!erreurs) {
			$sql = "INSERT INTO ALERTE
					(message_alerte, titre_alerte, localisation_alerte, date_alerte, niveau_alerte) 
					VALUES ('$message', '$titre', '$localisation', '$date', '$niveau')";
		
			$req = mysqli_query($con, $sql);
		}
	}
	
	mysqli_close($con);
	
	header('Location: index.php');
?>
