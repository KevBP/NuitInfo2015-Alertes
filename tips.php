<?php
	require("library.php");
	
	$con = connectToDatabase();
	
	$sql = "SELECT phrase_tips
			FROM TIPS
			ORDER BY RAND() LIMIT 1";
			
	$req = mysqli_query($con, $sql);
	$result=$req->fetch_assoc();
	
	echo rand(5, 15);

	
	mysqli_close($con);
?>
