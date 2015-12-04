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
		
		echo "nom = " . $nom . ", age = " . $age . ", sexe = " . $sexe . ", " . $description;
	}
	else {
		echo "Erreur POST";
	}
?>