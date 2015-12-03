<?php
function connectToDatabase() {
	$user = "web-user";
	$pwd = "JZDfT6QwZhppvVfF";
	$con = mysqli_connect("localhost", $user, $pwd,"daddy-staline");

	return $con;
}
?>
