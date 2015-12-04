<?php
/**
 * Created by PhpStorm.
 * User: nomce
 * Date: 04/12/15
 * Time: 03:35
 */
require("library.php");

if (isset($_GET['event'])){
    echo "orig " . $_GET['event'] ." \n";
    $local = mysqli_real_escape_string($con, htmlentities($_GET['event']));
    echo "blabla " . $local ." \n";
    $sql = "SELECT titre_alerte, niveau_alerte,message_alerte FROM ALERTE ORDER BY date_alerte DESC LIMIT $local";

    $req = mysqli_query($con, $sql);


    while($row = $req->fetch_assoc()) {
        $result[] = $row;
    }
    echo $result;
    echo json_encode($result);

}else{
    echo $_GET['event'];
}