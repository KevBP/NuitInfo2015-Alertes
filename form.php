<?php
	require("library.php");
	
	$con = connectToDatabase();
	
	if ($con != NULL && isset($_POST['titre']) && isset($_POST['message'])
			&& isset($_POST['localisation']) && isset($_POST['date-evenement'])
			&& isset($_POST['heure-evenement']) && isset($_POST['niveau'])) {
	
		$titre = mysqli_real_escape_string($con, $_POST['titre']);
		$message = mysqli_real_escape_string($con, $_POST['message']);
		$localisation = mysqli_real_escape_string($con, $_POST['localisation']);
		$date_evenement = mysqli_real_escape_string($con, $_POST['date-evenement']);
		$heure_evenement = mysqli_real_escape_string($con, $_POST['heure-evenement']);
		$niveau = mysqli_real_escape_string($con, $_POST['niveau']);
		
		$date = $date_evenement." ".heure_evenement;
		
		$sql = "INSERT INTO ALERTE
				(message_alerte, titre_alerte, localisation_alerte, date_alerte, niveau_alerte) 
				VALUES ('$message', '$titre', '$localisation', '$date', '$niveau')";
	
		$req = mysqli_query($con, $sql);
	}
	
	mysqli_close($con);
?>
