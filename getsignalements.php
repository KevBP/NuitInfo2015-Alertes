<?php
require("library.php");

$con = connectToDatabase();

$sql = "SELECT *
        FROM SIGNALEMENT
        WHERE SIGNALEMENT.id_signalement =
            (SELECT LISTE_SIGNALEMENTS.id_signalement
             FROM LISTE_SIGNALEMENTS
             WHERE id_alerte = ". $_GET['id'] .")";

echo $sql;
$req = mysqli_query($con, $sql);
$result = $req->fetch_assoc();
echo $result;
echo json_encode($result);

mysqli_close($con);
?>
