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


    while($row = $req->fetch_row()) {
        $result[] = Array(htmlspecialchars($row[0]), htmlspecialchars($row[1]), htmlspecialchars($row[2]), htmlspecialchars($row[3]));
        //$result[] = htmlspecialchars($row, ENT_QUOTES,"UTF-8");
    }
    var_dump($result);
    //echo json_encode($result);

}else{
    echo $_GET['event'];
}