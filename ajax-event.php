<?php
/**
 * Created by PhpStorm.
 * User: nomce
 * Date: 04/12/15
 * Time: 03:35
 */
require("library.php");
$con = connectToDatabase();

if (isset($_GET['event'])){
    $local = mysqli_real_escape_string($con, htmlentities($_GET['event']));
    $sql = "SELECT titre_alerte, niveau_alerte,message_alerte FROM ALERTE ORDER BY date_alerte DESC LIMIT $local";

    $req = mysqli_query($con, $sql);


    while($row = $req->fetch_assoc()) {
        $result[] =htmlentities($row,ENT_QUOTES,'');
        //$result[] = htmlspecialchars($row, ENT_QUOTES,"UTF-8");
    }
    echo $result;
    echo json_encode($result);

}else{
    echo $_GET['event'];
}