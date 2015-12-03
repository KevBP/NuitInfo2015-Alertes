<?php
	function connectToDatabase() {
		$user = "web-user";
		$pwd = "JZDfT6QwZhppvVfF";
		$con = mysqli_connect("localhost", $user, $pwd,"daddy-staline");
	
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return NULL;
		}
	
		mysqli_set_charset($con, "utf8");
		
		return $con;
}
?>
