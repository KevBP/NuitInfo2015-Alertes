<?php
	require("library.php");
	
	$con = connectToDatabase();
	
	$erreurs = false;
	
	if ($con != NULL && isset($_POST['nom_sig'])
			&& isset($_POST['age_sig']) && isset($_POST['sexe_sig'])
			&& isset($_POST['description_sig'])) {
			
		$nom = mysqli_real_escape_string($con, htmlentities($_POST['nom_sig']));
		$age = mysqli_real_escape_string($con, htmlentities($_POST['age_sig']));
		$sexe = mysqli_real_escape_string($con, htmlentities($_POST['sexe_sig']));
		$description = mysqli_real_escape_string($con, htmlentities($_POST['description_sig']));
		echo $_POST['id-alerte'];
		//echo "nom = " . $nom . ", age = " . $age . ", sexe = " . $sexe . ", " . $description;
		if (strlen($nom) < 1) {
			$erreurs = true;
			echo "Erreur nom";
		}
		
		if (!is_int($age) || $age < 0 || $age > 110) {
			$erreurs = true;
			echo "Erreur age";
		}
		
		if ($sexe != "H" || $sexe !="F") {
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
		}
		
	}
	else {
		echo "Erreur POST";
	}
?>