<?php
	require("library.php");
	
	$con = connectToDatabase();
	
	$sql = "SELECT message_tips
			FROM TIPS
			ORDER BY RAND() LIMIT 1";
			
	$req = mysqli_query($con, $sql);
	
	echo $req;

	echo "dsqdq";
	
	mysqli_close($con);
?>
