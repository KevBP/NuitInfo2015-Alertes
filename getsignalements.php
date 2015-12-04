<?php
require("library.php");

$func = function($value) {
    return htmlentities($value, ENT_QUOTES);
};

$con = connectToDatabase();

$sql = "SELECT *
        FROM SIGNALEMENT
        WHERE SIGNALEMENT.id_signalement =
            (SELECT LISTE_SIGNALEMENTS.id_signalement
             FROM LISTE_SIGNALEMENTS
             WHERE id_alerte = ". $_GET['id'] .")";

$req = mysqli_query($con, $sql);
$result;
while($row = $req->fetch_assoc()) {
    $result[] = array_map($func, $row);
}
echo json_encode($result);

mysqli_close($con);
?>
