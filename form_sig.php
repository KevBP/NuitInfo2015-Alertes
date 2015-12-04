<?php
	require("library.php");
	
	$con = connectToDatabase();
	
	$erreurs = false;
	
	if ($con != NULL && isset($_POST['nom_sig'])
			&& isset($_POST['age_sig']) && isset($_POST['sexe_sig'])
			&& isset($_POST['description_sig']) && isset($_POST['id_alerte'])) {
			
		$nom = mysqli_real_escape_string($con, htmlentities($_POST['nom_sig']));
		$age = mysqli_real_escape_string($con, htmlentities($_POST['age_sig']));
		$age = (int) $age;
		$sexe = mysqli_real_escape_string($con, htmlentities($_POST['sexe_sig']));
		$description = mysqli_real_escape_string($con, htmlentities($_POST['description_sig']));
		$id_alerte = $_POST['id_alerte'];
		
		if (strlen($nom) < 1) {
			$erreurs = true;
			echo "Erreur nom";
		}
		
		if (!is_int($age) || $age < 0 || $age > 110) {
			$erreurs = true;
			echo "Erreur age";
		}
		
		if ($sexe != 'H' && $sexe !='F') {
			$erreurs = true;
			echo "Erreur sexe";
		}
		
		if (strlen($description) > 2048) {
			$erreurs = true;
			echo "Erreur description";
		}
		
		if (!$erreurs) {
			$sql = "INSERT INTO SIGNALEMENT
					(nom_prenom_signalement, age_signalement, sexe_signalement, description_signalement)
					VALUES ('$nom', '$age', '$sexe', '$description')";
			
			$req = mysqli_query($con, $sql);
			
			$id = mysqli_insert_id($con);
			
			$sql = "INSERT INTO LISTE_SIGNALEMENTS (id_alerte, id_signalement) VALUES ('$id_alerte', '$id')";
		}
		
	}
	else {
		echo "Erreur POST";
	}

	mysqli_close($con);
	
	header('Location: index.php');
?>